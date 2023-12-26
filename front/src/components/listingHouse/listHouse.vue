<template>
    <div class="container">
        <div class="listhouse">
            <div v-if="posts" class="listhouse__post" v-for="(post, index) in posts" :key="index">
                <div style="width: 400px; display: flex; flex-wrap: wrap; gap: 10px; padding: 30px;">
                    <p style="background-color: aqua; padding: 10px; border-radius: 10px;" v-for="(item, index) in post.tags" :key="index" >{{ item.name }}</p>
                </div>

                <iframe 
                :key="index"
                :src="post.link"
                width="400"
                height="500"
                frameborder="0"/>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref, onMounted } from "vue";

    const posts = ref()

    onMounted(async () => {
        const res = await fetch('/api/posts')
        const json = (await res.json()).posts.filter(post => post.template == "advertisement")

        for (let i = 0; i < json.length; i++) {
            const resTags = await fetch(`/api/tags?postId=${json[i].id}`)
            const jsonTags = (await resTags.json()).tags
            json[i]['tags'] = jsonTags
        }

        posts.value = json
    })
</script>
    
<style scoped>

    .container {
        margin-top: 50px;
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .listhouse {
        display: flex;
        flex-direction: row;
        gap: 25px;
        order: 3;
        flex-wrap: wrap;
        width: 1445px;
    }

    .listhouse__post {
	width: 435px;
	height: 500px;
	display: flex;
	flex-direction: column;
	padding: 10px;
	border-radius: 25px;
	overflow: hidden;
}

.listhouse__post:hover {
	transition: 0.3s;
	box-shadow: 0px 0px 5px 0px var(--dark);
}

.listhouse__post:hover .post__image{
	transform: scale(1.05);
	width: 435px;
	height: 304px;
}

.listhouse__post__grid-conteiner {
	margin-top: 16px;
	display: grid;
	grid-template-columns: 90% 10%;
}
.post__info {
	align-items: normal;
}
.post__image {
	background-image: url(@/assets/post--image.png);
	width: 435px;
	height: 304px;
	background-repeat: no-repeat;
	border-radius: 25px 25px 0px 0px;
	transition: all 0.3s;
}
.post__price {
	font-weight: 600;
	font-size: 32px;
}
.post__street {
	margin-top: 6px;
	font-weight: 600;
	font-size: 24px;
}
.post__adress {
	display: flex;
	margin-top: 6px;
	font-weight: 400;
	font-size: 16px;
}

.post__adress a {
	display: flex;
	align-items: center;
	margin-top: 6px;
	padding: 6px;
	margin-top: 2px;
	margin-bottom: 2px;
	font-weight: 400;
	font-size: 16px;
}
.post__description {
	display: flex;
	align-items: center;
	margin-top: 6px;
	font-weight: 400;
	font-size: 16px;
}

.post__description a {
	display: flex;
	align-items: center;
	margin-top: 6px;
	padding: 6px;
	margin-top: 2px;
	margin-bottom: 2px;
	font-weight: 400;
	font-size: 16px;
}

.post__tag {
	font-weight: 400;
	font-size: 16px;
	display: flex;
	flex-direction: row;
	width: 435px;
	margin-top: 26px;
	gap: 10px;
}

/* Работа с тегом */

.tag__1 {
	display: flex;
	font-size: 16px;
}

.tag__1 a {
	border: 1px solid var(--orange);
	border-radius: 15px;
	padding: 5px 10px;
	font-size: 12px;
	align-items: center;
	display: flex;
	
}

.post__like {
	display: flex;
}
</style>