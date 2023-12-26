
<template>
    <div class="container" id="review">
		<p style="font-size: 30px;">Відгуки</p>
        <div class="main__reviews">
			<iframe 
			v-if="posts"
			v-for="(post, index) in posts"
			:key="index"
			:src="post.link"
			width="400"
			height="500"
			frameborder="0"/>
        </div>
    </div>
</template>

<script setup>
	import { ref, onMounted } from "vue";

	const posts = ref()

	onMounted(async () => {
		const res = await fetch('/api/posts')
		const json = await res.json()
		posts.value = json.posts.filter(post => post.template == "review")
		console.log(posts.value)
	})
</script>

<style scoped>
.container {
    margin-top: 60px;
    display: flex;
	flex-direction: column;
    align-items: center;
    justify-content: center;
}
.main__reviews {
	margin-top: 20px;
	display: flex;
	flex-direction: row;
	width: 100%;
	gap: 17px;
	justify-content: center;
	align-items: center;
	overflow-x: scroll;
	overflow-y: hidden;
}
.reviws--part1 {
	display: grid;
	grid-template-columns: 32% 68%;
	background-color: var(--white);
	border-radius: 25px;
	padding-top: 10px;
	padding-bottom: 10px;
	width: 545px;
}
.reviews--part1__img {
	background-image: url(@/assets/reviws__img.png);
	background-repeat: no-repeat;
	background-origin: padding-box;
	width: 150px;
	height: 150px;
	border-radius: 25px;
	margin-left: 8px;

}
.reviews--part1__info {
	padding-left: 20px;
	width: 250px;
}
.info__title {
	font-size: 48px;
	font-style: normal;
	font-weight: 600;
	line-height: normal;
}
.info__description {
	font-size: 20px;
	font-weight: 400;

}
.info__raiting {
	margin-top: 8px;
	gap: 5px;
	display: flex;
}
.reviws--part2 {
	display: grid;
	grid-template-columns: 32% 68%;
	background-color: var(--white);
	border-radius: 25px;
	padding-top: 10px;
	padding-bottom: 10px;
	width: 545px;
	overflow: hidden;
}
.reviews--part2__img {
	background-image: url(@/assets/reviws__img.png);
	background-repeat: no-repeat;
	background-origin: padding-box;
	width: 150px;
	height: 150px;
	border-radius: 25px;
	margin-left: 8px;
}
.reviews--part2__info {
	padding-left: 20px;
	width: 250px;
}
.reviws--part3 {
	display: grid;
	grid-template-columns: 32% 68%;
	background-color: var(--white);
	border-radius: 25px;
	padding-top: 10px;
	padding-bottom: 10px;
	width: 545px;
}
.reviews--part3__img {
	background-image: url(@/assets/reviws__img.png);
	background-repeat: no-repeat;
	background-origin: padding-box;
	width: 150px;
	height: 150px;
	border-radius: 25px;
	margin-left: 8px;
}
.reviews--part3__info {
	padding-left: 20px;
	width: 250px;
}

@media screen and (max-width: 414px) {
	.container {
    margin-top: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.main__reviews {
	display: flex;
	flex-direction: column;
	height: 100%;
	width: 100%;
	gap: 17px;
	overflow: hidden;
	justify-content: center;
	align-items: center;
}
.reviws--part1 {
	display: flex;
	flex-direction: row;
	align-items: center;
	justify-content: center;
	background-color: var(--white);
	border-radius: 25px;
	padding-top: 10px;
	padding-bottom: 10px;
	width: 400px;
}
.reviews--part1__img {
	background-image: url(@/assets/mobile_reviws__img.png);
	background-repeat: no-repeat;
	width: 100px;
	height: 100px;
	border-radius: 25px;
	margin-left: 0;
}
.reviews--part1__info {
	padding-left: 20px;
}
.info__title {
	font-size: 30px;
	font-style: normal;
	font-weight: 600;
	line-height: normal;
}
.info__description {
	font-size: 15px;
	font-weight: 400;

}
.info__raiting {
	margin-top: 8px;
	gap: 5px;
	display: flex;
}
.reviws--part2 {
	display: flex;
	flex-direction: row;
	align-items: center;
	justify-content: center;
	background-color: var(--white);
	border-radius: 25px;
	padding-top: 10px;
	padding-bottom: 10px;
	width: 400px;
}
.reviews--part2__img {
	background-image: url(@/assets/mobile_reviws__img.png);
	background-repeat: no-repeat;
	width: 100px;
	height: 100px;
	border-radius: 25px;
	margin-left: 0;
	object-fit: contain;
}
.reviews--part2__info {
	padding-left: 20px;
}
.reviws--part3 {
	display: flex;
	flex-direction: row;
	align-items: center;
	justify-content: center;
	background-color: var(--white);
	border-radius: 25px;
	padding-top: 10px;
	padding-bottom: 10px;
	width: 400px;
}
.reviews--part3__img {
	background-image: url(@/assets/mobile_reviws__img.png);
	background-repeat: no-repeat;
	width: 100px;
	height: 100px;
	border-radius: 25px;
	margin-left: 0;
	object-fit: cover;
}
.reviews--part3__info {
	padding-left: 20px;
}
}
</style>