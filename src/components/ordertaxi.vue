
<template>
    <div class="container">
        <div class="main__taxi">
				<div class="taxi__grid-container">
					<div class="taxi__img"></div>
					<div class="taxi__info">
						<div class="taxi__title"><a>Заплануй таксі</a></div>
						<div class="taxi__description">
							<div class="taxi__description__free-close"><svg width="30" height="33" viewBox="0 0 30 33" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M19.31 11.1068L21.94 13.9274L15.3237 20.7938C14.7225 21.4294 13.9263 21.7485 13.1287 21.7485C12.3313 21.7485 11.5263 21.4268 10.915 20.7833L7.445 17.236L10.055 14.3956L13.1213 17.5314L19.31 11.1094V11.1068ZM30 16.4725C30 25.1982 23.2712 32.2967 15 32.2967C6.72875 32.2967 0 25.1982 0 16.4725C0 7.74678 6.72875 0.648315 15 0.648315C23.2712 0.648315 30 7.74678 30 16.4725ZM26.25 16.4725C26.25 9.9292 21.2038 4.60436 15 4.60436C8.79625 4.60436 3.75 9.9292 3.75 16.4725C3.75 23.0158 8.79625 28.3406 15 28.3406C21.2038 28.3406 26.25 23.0158 26.25 16.4725Z" fill="black"/>
								</svg>
								<a>Безкоштовне скасування</a>
								</div>
							<div class="taxi__description__hight--raiting"><svg width="30" height="33" viewBox="0 0 30 33" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M19.31 11.1068L21.94 13.9274L15.3237 20.7938C14.7225 21.4294 13.9263 21.7485 13.1287 21.7485C12.3313 21.7485 11.5263 21.4268 10.915 20.7833L7.445 17.236L10.055 14.3956L13.1213 17.5314L19.31 11.1094V11.1068ZM30 16.4725C30 25.1982 23.2712 32.2967 15 32.2967C6.72875 32.2967 0 25.1982 0 16.4725C0 7.74678 6.72875 0.648315 15 0.648315C23.2712 0.648315 30 7.74678 30 16.4725ZM26.25 16.4725C26.25 9.9292 21.2038 4.60436 15 4.60436C8.79625 4.60436 3.75 9.9292 3.75 16.4725C3.75 23.0158 8.79625 28.3406 15 28.3406C21.2038 28.3406 26.25 23.0158 26.25 16.4725Z" fill="black"/>
								</svg>
								<a>Таксі з високим рейтингом</a>
								</div>
						</div>
						<div class="taxi__button"><a>Заплонувати</a></div>
					</div>
				</div>
		</div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>

.container {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
    .main__taxi {
	margin-top: 40px;
	border-radius: 25px;
	width: 1438px;
	height: 384px;
	background-color: #ffffff;
	padding: 25px;
}
.taxi__grid-container {
	display: grid;
	grid-template-columns: 60% 40%;
}
.taxi__img {
	background-image: url(../assets/taxi--image.png);
	width: 719px;
	height: 384px;
	margin-top: 70px;
	border-radius: 25px;

}
.taxi__info {
}
.taxi__title {
	margin-top: 34px;  
}

.taxi__title a {
	display: block;
	width: auto;
	height: auto;
	padding-top: 20px;
	padding-bottom: 20px;
	padding-right: 90px;
	padding-left: 90px;
	border: 5px dashed #000;
	border-radius: 25px;
	font-size: 48px;
	font-weight: 600;
	font-style: normal;
	font-weight: 600;
	line-height: normal;
}

.taxi__description {
	margin-top: 26px;

}
.taxi__description__free-close {
	display: flex;
	align-items: center;
}

.taxi__description__free-close a {
	font-size: 24px;
	font-style: normal;
	font-weight: 600;
	margin-left: 10px;
}

.taxi__description__hight--raiting {
	display: flex;
	align-items: center;
	margin-top: 8px;
}

.taxi__description__hight--raiting a {
	font-size: 24px;
	font-style: normal;
	font-weight: 600;
	margin-left: 10px;
}

.taxi__button {
	font-size: 20px;
	font-style: normal;
	font-weight: 600;
	margin-top: 80px;
	width: 100%;
}

.taxi__button a {
	padding: 15px 220px;
	width: 100%;
	border-radius: 15px;
	margin-top: 36px;
	transition: all 0.3s;
	border: 2px solid #ffffff;
	background-color: #FFBC57;
}

.taxi__button a:hover {
	
	background-color: #ffffff;
	border: 2px solid #000000;
}












@media screen and (max-width: 414px) {
	.container {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
    .main__taxi {
	margin-top: 40px;
	border-radius: 25px;
	width: 100%;
	background-color: #ffffff;
	padding: 0px;
}
.taxi__grid-container {
	display: flex;
	justify-content: center;
	align-items: center;
}
.taxi__img {
	background-image: url(../assets/taxi--image.png);
	width: 414px;
	height: 384px;
	margin-top: 70px;
	border-radius: 25px;
	opacity: 0.9;
	-webkit-mask-image: linear-gradient(to top, transparent, black);

}
.taxi__info {
	position: absolute;
	display: flex;
	align-items: center;
	flex-direction: column;
	background-color: rgba(252, 252, 252, 0.3);
	backdrop-filter: blur(10px);
	padding: 35px 15px;
	border-radius: 10px;
}
.taxi__title {
	margin-top: 0px;

}

.taxi__title a {
	display: block;
	width: auto;
	height: auto;
	padding-top: 20px;
	padding-bottom: 20px;
	padding-right: 60px;
	padding-left: 60px;
	border: 5px dashed #000;
	border-radius: 25px;
	font-size: 30px;
	font-weight: 600;
	font-style: normal;
	font-weight: 600;
	line-height: normal;
}

.taxi__description {
	margin-top: 26px;

}
.taxi__description__free-close {
	display: flex;
	align-items: center;
}

.taxi__description__free-close a {
	font-size: 24px;
	font-style: normal;
	font-weight: 600;
	margin-left: 10px;
}

.taxi__description__hight--raiting {
	display: flex;
	align-items: center;
	margin-top: 8px;
}

.taxi__description__hight--raiting a {
	font-size: 20px;
	font-style: normal;
	font-weight: 600;
	margin-left: 10px;
}

.taxi__button {
	font-size: 25px;
	font-style: normal;
	font-weight: 600;
	margin-top: 80px;
}

.taxi__button a {
	padding: 15px 35px;
	background-color: var(--orange);
	border-radius: 15px;
	margin-top: 36px;
}
}
</style>