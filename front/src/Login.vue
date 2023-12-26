<template>
    <main>
        <div class="container">
            <p style="font-size: 30px;">Реєстрація</p>

            <input v-model="email" placeholder="Email" type="text">
            <input v-model="password" placeholder="Пароль" type="password">

            <button @click="register" :disabled="!(password && email)">
                Відправити
            </button>
        </div>
    </main>
</template>

<script setup>
    import { ref } from 'vue'

    const email = ref()
    const password = ref()

    async function register() {
        const res = await fetch(`/api/login`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                password: password.value,
                email: email.value,
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