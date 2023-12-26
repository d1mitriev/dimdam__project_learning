
<template>
    <div class="container" id="listhouse">
        <div class="main__ads">
                    <div class="main__ads__title">
                        <div class="main_ads__title__text">Оголошення</div>
                        <div class="main_ads__title__more">Детальніше</div>
                    </div>
                    
					<div style="display: flex; gap: 10px; margin-top: 10px;">
						<div v-if="posts" v-for="(post, index) in posts" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">

							<div style="width: 400px; display: flex; flex-wrap: wrap; gap: 10px; padding: 30px;">
								<p style="background-color: aqua; padding: 10px; border-radius: 10px;" v-for="(item, index) in post.tags" :key="index" >{{item.name}}</p>
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
    </div>
</template>

<script setup>
	import { ref, onMounted } from "vue";

	const posts = ref()

	onMounted( async () => {
		const res = await fetch('/api/posts')
		const json = (await res.json()).posts.filter(post => post.template == "advertisement")

		for (let i = 0; i<json.length; i++) {
			const resTags = await fetch(`/api/tags?postId=${json[i].id}`)
			const jsonTags = (await resTags.json()).tags
			json[i]['tags'] = jsonTags
		}

		posts.value = json
	})

</script>

<style scoped>


    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .main__ads {
	margin-top: 70px;
	align-items: start;
    text-align: start;
	display: flex;
	flex-direction: column;
}
.main__ads__title {
	display: flex;
	flex-direction: row;
	align-items: center;
}
.main_ads__title__text {
	font-size: 40px;
	font-weight: 600;
	
}
.main_ads__title__more {
	margin-left: 13px;
	padding-left: 10px;
	padding-right: 10px;
	padding-top: 8px;
	padding-bottom: 8px;
	border-radius: 15px;
	color: #000000;
	border: 1px solid #000000;
}

.main_ads__title__more:hover {
	transition: 0.3s;
	background-color: #000000;
	color: var(--white);
}

.main__ads_post {
	margin-top: 35px;
	display: flex;
}
.main__ads__post--1 {
	width: 435px;
	height: 500px;
	display: flex;
	flex-direction: column;
	padding: 10px;
	border-radius: 25px;
	overflow: hidden;
}

.main__ads__post--1:hover {
	transition: 0.3s;
	box-shadow: 0px 0px 5px 0px var(--dark);
}

.main__ads__post--1:hover .post--1__image{
	transform: scale(1.05);
	width: 435px;
	height: 304px;
}

.main__ads__post--1__grid-conteiner {
	margin-top: 16px;
	display: grid;
	grid-template-columns: 90% 10%;
}
.post--1__info {
	align-items: normal;
}
.post--1__image {
	background-image: url(@/assets/post--image.png);
	width: 435px;
	height: 304px;
	background-repeat: no-repeat;
	border-radius: 25px 25px 0px 0px;
	transition: all 0.3s;
}
.post--1__price {
	font-weight: 600;
	font-size: 32px;
}
.post--1__street {
	margin-top: 6px;
	font-weight: 600;
	font-size: 24px;
}
.post--1__adress {
	display: flex;
	margin-top: 6px;
	font-weight: 400;
	font-size: 16px;
}

.post--1__adress a {
	display: flex;
	align-items: center;
	margin-top: 6px;
	padding: 6px;
	margin-top: 2px;
	margin-bottom: 2px;
	font-weight: 400;
	font-size: 16px;
}
.post--1__description {
	display: flex;
	align-items: center;
	margin-top: 6px;
	font-weight: 400;
	font-size: 16px;
}

.post--1__description a {
	display: flex;
	align-items: center;
	margin-top: 6px;
	padding: 6px;
	margin-top: 2px;
	margin-bottom: 2px;
	font-weight: 400;
	font-size: 16px;
}

.post--1__tag {
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

.post--1__like {
	display: flex;
}

























@media screen and (max-width: 414px) {
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .main__ads {
    align-items: center;
    width: 100%;
	margin-top: 70px;
	display: flex;
	flex-direction: column;
}
.main__ads__title {
	display: flex;
	flex-direction: row;
	align-items: center;
}
.main_ads__title__text {
	font-size: 40px;
	font-weight: 600;
	
}
.main_ads__title__more {
	margin-left: 13px;
	padding-left: 6px;
	padding-right: 6px;
	padding-top: 10px;
	padding-bottom: 10px;
	border-radius: 15px;
	color: var(--dark);
	border: 1px solid var(--dark);
}

.main_ads__title__more:hover {
	transition: 0.3s;
	background-color: var(--dark);
	color: var(--white);
}

.main__ads_post {
    align-items: center;
	margin-top: 35px;
	display: flex;
    flex-direction: column;
    width: 100%;
}
.main__ads__post--1 {
    align-items: center;
	width: auto;
	height: auto;
	display: flex;
	flex-direction: column;
	padding: 10px;
	border-radius: 25px;
}

.main__ads__post--1:hover {
	transition: 0.3s;
	box-shadow: 0px 0px 5px 0px var(--dark);
}

.main__ads__post--1__grid-conteiner {
    width: 100%;
	margin-top: 16px;
    display: flex;


}
.post--1__info {
	display: flex;
    flex-direction: column;
    align-content: start;
    align-items: start;
}
.post--1__image {
	background-image: url(@/assets/post--image.png);
	width: 400px;
	height: 290px;
	background-repeat: no-repeat;
    border-radius: 25px;
}
.post--1__price {
	font-weight: 600;
	font-size: 32px;
}
.post--1__street {
	margin-top: 6px;
	font-weight: 600;
	font-size: 24px;
}
.post--1__adress {
	display: flex;
	margin-top: 6px;
	font-weight: 400;
	font-size: 16px;
}

.post--1__adress a {
	display: flex;
	align-items: center;
	margin-top: 6px;
	padding: 6px;
	margin-top: 2px;
	margin-bottom: 2px;
	font-weight: 400;
	font-size: 16px;
}
.post--1__description {
	display: flex;
	align-items: center;
	margin-top: 6px;
	font-weight: 400;
	font-size: 16px;
}

.post--1__description a {
	display: flex;
	align-items: center;
	margin-top: 6px;
	padding: 6px;
	margin-top: 2px;
	margin-bottom: 2px;
	font-weight: 400;
	font-size: 16px;
}

.post--1__tag {
	font-weight: 400;
	display: flex;
	flex-direction: row;
	width: 350px;
	margin-top: 26px;
	gap: 10px;
}

/* Работа с тегом */

.tag__1 {
	display: flex;
}

.tag__1 a {
	border: 1px solid var(--orange);
	border-radius: 15px;
	padding: 5px 10px;
	font-size: 10px;
	align-items: center;
	display: flex;
	
}

.post--1__like {
	display: flex;
}
}
</style>