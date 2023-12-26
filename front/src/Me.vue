<template>
    <main style=" display: flex; justify-content: center; align-items: center; min-height: 60vh; background-color: rgb(176, 176, 177);">
        <div v-if="response" class="container">
            <p style="color: white; font-size: 30px;">Профіль</p>
            <p style="margin-top: 30px;">{{ response.name }}</p>
            <p>{{ response.email }}</p>
            <p>{{ response.gender }}</p>
            <p>{{ response.activity }}</p>

            <button @click="$router.push('/')" style="font-size: 20px; border-radius: 10px; width: 100px; height: 50px; cursor: pointer; margin-top: 50px;">Назад</button>
        </div>
    </main>
</template>

<style scoped>
    .container {
        min-width: 400px;
        min-height: 400px;
        background-color: rgb(92, 94, 94);
        margin-top: 400px;
        margin-bottom: 400px;
        border-radius: 10px;
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        max-width: 400px;
    }

    .container p {
        color: white;
    }
</style>

<script setup>
    import { ref, onMounted } from 'vue'

    const email = localStorage.getItem('email')

    const response = ref(null)

    onMounted(async () => {
        const res = await fetch('/api/me', {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                email: email
            })
        })

        const json = await res.json()
        response.value = json.user
    })
</script>