<template>
    <main>
        <div class="container">
            <p style="font-size: 30px;">Реєстрація</p>
            <input v-model="name" placeholder="Ім'я" type="text">
            <input v-model="password" placeholder="Пароль" type="password">
            <input v-model="email" placeholder="Email" type="text">
            <select v-model="gender" name="Стать" id="">
                <option value="male">Чоловік</option>
                <option value="female">Жінка</option>
            </select>
            <p style="width: 100%; text-align: start; margin-top: 20px;">Дата народження</p>
            <VDatePicker v-model="birthday" style="width: 105%;"/>
            <input placeholder="Чим займаєтесь" type="text" v-model="activity"/>
                
            <button @click="register" :disabled="!(name && password && gender && birthday && activity && email)">
                Відправити
            </button>

            <button @click="$router.push('/login')">
                Або ввійти в існуючий аккаунт.
            </button>
        </div>
    </main>
</template>

<script setup>
    import { ref } from 'vue'

    const name = ref()
    const email = ref()
    const password = ref()
    const gender = ref('male')
    const birthday = ref(null)
    const activity = ref()

    async function register() {
        const res = await fetch(`/api/register`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                name: name.value,
                password: password.value,
                email: email.value,
                gender: gender.value,
                birthday: birthday.value,
                activity: activity.value,
            })
        })

        if (res.status == 200) {
            localStorage.setItem('email', email.value)
            location.replace('/')
        }
    }
</script>

<style scoped>
    main {
        min-height: 50vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgb(169, 170, 170);
    }

    .container {
        margin-top: 230px;
        width: 400px;
        background-color: rgb(210, 212, 212);
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 30px;
        gap: 10px;
        margin-bottom: 100px;
    }

    .container input {
        width: 100%;
        height: 30px;
        font-size: 20px;
        border-radius: 10px;
        border-width: 0px;
        padding: 10px;
    }

    .container select {
        width: 105%;
        font-size: 20px;
        border-radius: 10px;
        border-width: 0px;
        padding: 10px;
    }

    .container button {
        width: 105%;
        font-size: 20px;
        border-radius: 10px;
        border-width: 0px;
        padding: 10px;
        cursor: pointer;
    }

    .container button:disabled {
        cursor: not-allowed;
    }
</style>