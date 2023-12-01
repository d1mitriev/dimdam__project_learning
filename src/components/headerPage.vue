<template>
        <header>
	        <div :id="bannerId" class="header__banner" :style="{ background: 'url(' + getCurrentBanner + ') center center no-repeat', backgroundSize: 'cover' }">
	        	<div class="header__banner__info">
	        		<div class="info__title"><p>Ми завжди раді гостям</p></div>
	        		<div class="info__search">
						<!-- Выбор области -->
	        			<div class="search__parametr--city">
	        				<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
	        					<path d="M3.87333 1.35654L3.89783 1.34837L7.06533 0.298192C8.15943 -0.0651045 9.33642 -0.097173 10.4487 0.20601L16.954 2.09516C17.7505 2.30629 18.5958 2.23199 19.3433 1.88513L19.9267 1.61442C20.8126 1.24589 21.7758 1.10165 22.7309 1.19447C23.6859 1.28729 24.6033 1.61432 25.4018 2.14656C26.2002 2.6788 26.8551 3.39982 27.3083 4.24573C27.7615 5.09163 27.9991 6.03629 28 6.996V21.0859C27.9975 22.3477 27.5872 23.5748 26.8303 24.5842C26.0734 25.5936 25.0104 26.3312 23.8 26.6868L20.4528 27.737C19.8881 27.9126 19.3 28.0011 18.7087 27.9996C18.1816 28.0063 17.6563 27.9351 17.15 27.7884L10.3833 25.9214C9.76497 25.7536 9.11243 25.7589 8.49684 25.9366L5.76333 26.7254C5.07708 26.8913 4.36212 26.8993 3.67231 26.7489C2.98249 26.5984 2.3358 26.2934 1.78094 25.8567C1.22608 25.42 0.777521 24.8632 0.469032 24.228C0.160545 23.5928 0.000173569 22.8959 0 22.1897V6.85131C0.00176811 5.64808 0.374701 4.47471 1.06791 3.49131C1.76111 2.50792 2.74082 1.76242 3.87333 1.35654ZM23.128 24.4511C23.858 24.24 24.4999 23.798 24.9576 23.1913C25.4152 22.5846 25.664 21.8459 25.6667 21.0859V6.996C25.6723 6.41803 25.5325 5.84791 25.2602 5.33814C24.9878 4.82836 24.5916 4.39531 24.108 4.07884C23.5326 3.69709 22.8572 3.4941 22.1667 3.4954C21.7214 3.49553 21.2805 3.58356 20.8693 3.75445C20.8693 3.75445 20.0002 4.12668 19.8345 4.18619V25.4815L23.128 24.4511ZM17.5 25.464V4.52108C17.1037 4.50005 16.7106 4.43946 16.3263 4.34021L10.5 2.64709V23.5655L17.5 25.464ZM2.33333 22.1897C2.33308 22.5393 2.41133 22.8844 2.56231 23.1996C2.71328 23.5148 2.93311 23.7921 3.20558 24.011C3.47805 24.2298 3.7962 24.3847 4.13652 24.4641C4.47684 24.5435 4.83066 24.5455 5.17183 24.4698L8.16667 23.6262V2.41605L4.64567 3.55841C3.96898 3.80363 3.38411 4.25116 2.97044 4.84024C2.55677 5.42933 2.33434 6.13145 2.33333 6.85131V22.1897Z" fill="#6D6D6D"/>
	        					</svg>
	        					<select name="city" id="city" v-model="selectedCity" class="parametr--city__select-menu" @change="updateInput('input3', $event.target.value)">
									<option value="" disabled>Вкажіть місто, регіон</option>
  								  <option v-for="city in uniqueCities" :key="city.id" :value="city.name">{{ city.name }}</option>
  								</select>
	        			</div>
						<!-- Календарь въезда и выезда -->
	        			<div class="search__parametr--data">
	        				<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.33333 14H7C5.71317 14 4.66667 15.0465 4.66667 16.3333V18.6667C4.66667 19.9535 5.71317 21 7 21H9.33333C10.6202 21 11.6667 19.9535 11.6667 18.6667V16.3333C11.6667 15.0465 10.6202 14 9.33333 14ZM7 18.6667V16.3333H9.33333V18.6667H7ZM22.1667 2.33333H21V1.16667C21 0.522667 20.4785 0 19.8333 0C19.1882 0 18.6667 0.522667 18.6667 1.16667V2.33333H9.33333V1.16667C9.33333 0.522667 8.81183 0 8.16667 0C7.5215 0 7 0.522667 7 1.16667V2.33333H5.83333C2.61683 2.33333 0 4.95017 0 8.16667V22.1667C0 25.3832 2.61683 28 5.83333 28H22.1667C25.3832 28 28 25.3832 28 22.1667V8.16667C28 4.95017 25.3832 2.33333 22.1667 2.33333ZM5.83333 4.66667H22.1667C24.0963 4.66667 25.6667 6.237 25.6667 8.16667V9.33333H2.33333V8.16667C2.33333 6.237 3.90367 4.66667 5.83333 4.66667ZM22.1667 25.6667H5.83333C3.90367 25.6667 2.33333 24.0963 2.33333 22.1667V11.6667H25.6667V22.1667C25.6667 24.0963 24.0963 25.6667 22.1667 25.6667Z" fill="#6D6D6D"/></svg>
							
							<DatePicker v-model="range" is-range @update:start="updateInputStart" @update:end="updateInputEnd">
								<template #day-format="{ date }">
   								  {{ formatDate(date) }}
   								</template>
    						 		<template #default="{ inputValue, inputEvents }">
    						   		<div class="parametr--data__calendar">
									<input
  									class="calendar__input"
  									:value="inputValue.start"
  									v-on="inputEvents.start"
  									placeholder="Заїзд"
      								/>
    						    	 <svg
    						    	   width="47"
    						    	   height="2"
    						    	   viewBox="0 0 47 2"
    						    	   fill="none"
    						    	   xmlns="http://www.w3.org/2000/svg"
    						    	 >
    						    	   <line
    						    	     x1="0.75"
    						    	     y1="1.25"
    						    	     x2="46.25"
    						    	     y2="1.25"
    						    	     stroke="#6D6D6D"
    						    	     stroke-width="1.5"
    						    	     stroke-linecap="round"
    						    	   />
    						    	 </svg>
    						    	 <input
    						    	   class="calendar__input"
    						    	   :value="inputValue.end"
									   v-on="inputEvents.end"
    						    	   placeholder="Від'їзд"
    						    	 />
    						   		</div>
    						 		</template>
    						</DatePicker>
						</div>
						<!-- Инпуты определния количества людей -->
	        			<div class="search__parametr--person">
	        				<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
	        					<path d="M10.5 14C14.366 14 17.5 10.866 17.5 7C17.5 3.13401 14.366 0 10.5 0C6.63401 0 3.5 3.13401 3.5 7C3.5 10.866 6.63401 14 10.5 14Z" fill="#6D6D6D"/>
	        					<path d="M10.5 16.3334C4.70367 16.3398 0.00645313 21.037 0 26.8334C0 27.4777 0.52232 28 1.16665 28H19.8333C20.4776 28 20.9999 27.4777 20.9999 26.8334C20.9935 21.037 16.2963 16.3397 10.5 16.3334Z" fill="#6D6D6D"/>
	        					</svg>
	        					<input @input="updateInputPerson('input1', $event)" class="person__human" type="text" id="date--search--output" placeholder="2 дорослых"/>	
	        					<svg width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
	        						<circle cx="2" cy="2" r="2" fill="#6D6D6D"/>
	        					</svg>
	        					<input @input="updateInputPerson('input2', $event)" class="person__kids" type="text" id="date--search--output" placeholder="Без дітей"/>
	        					<svg width="12" height="19" viewBox="0 0 12 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	        						<path d="M11.0524 5.00797L7.68952 1.62782C7.20069 1.15833 6.55067 0.896351 5.87463 0.896351C5.1986 0.896351 4.54858 1.15833 4.05975 1.62782L0.696899 5.00797C0.490556 5.21542 0.374634 5.49679 0.374634 5.79017C0.374634 6.08354 0.490556 6.36491 0.696899 6.57236C0.903242 6.77981 1.1831 6.89635 1.47492 6.89635C1.76673 6.89635 2.04659 6.77981 2.25293 6.57236L5.61578 3.19146C5.68454 3.12236 5.77778 3.08354 5.875 3.08354C5.97222 3.08354 6.06546 3.12236 6.13422 3.19146L9.49633 6.57236C9.70268 6.77981 9.98254 6.89635 10.2744 6.89635C10.5662 6.89635 10.846 6.77981 11.0524 6.57236C11.2587 6.36491 11.3746 6.08354 11.3746 5.79017C11.3746 5.49679 11.2587 5.21542 11.0524 5.00797Z" fill="#6D6D6D"/>
	        						<path d="M11.0524 13.992L7.68952 17.3722C7.20069 17.8417 6.55067 18.1036 5.87463 18.1036C5.1986 18.1036 4.54858 17.8417 4.05975 17.3722L0.696899 13.992C0.490556 13.7846 0.374634 13.5032 0.374634 13.2098C0.374634 12.9165 0.490556 12.6351 0.696899 12.4276C0.903242 12.2202 1.1831 12.1036 1.47492 12.1036C1.76673 12.1036 2.04659 12.2202 2.25293 12.4276L5.61578 15.8085C5.68454 15.8776 5.77778 15.9165 5.875 15.9165C5.97222 15.9165 6.06546 15.8776 6.13422 15.8085L9.49633 12.4276C9.70268 12.2202 9.98254 12.1036 10.2744 12.1036C10.5662 12.1036 10.846 12.2202 11.0524 12.4276C11.2587 12.6351 11.3746 12.9165 11.3746 13.2098C11.3746 13.5032 11.2587 13.7846 11.0524 13.992Z" fill="#6D6D6D"/>
	        					</svg>
	        			</div>
						<!-- Кнопка поиска -->
	        			<button class="search__button" @click="openModal">
	        				<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
	        				<path d="M27.6955 26.0458L20.7317 19.082C22.6294 16.761 23.5625 13.7995 23.3378 10.8098C23.1132 7.82021 21.7481 5.0313 19.5249 3.01995C17.3016 1.00861 14.3904 -0.0712824 11.3933 0.00365469C8.39615 0.0785918 5.5425 1.30262 3.42256 3.42256C1.30262 5.5425 0.0785918 8.39615 0.00365469 11.3933C-0.0712824 14.3904 1.00861 17.3016 3.01995 19.5249C5.0313 21.7481 7.82021 23.1132 10.8098 23.3378C13.7995 23.5625 16.761 22.6294 19.082 20.7317L26.0458 27.6955C26.2659 27.908 26.5606 28.0256 26.8665 28.023C27.1724 28.0203 27.465 27.8976 27.6813 27.6813C27.8976 27.465 28.0203 27.1724 28.023 26.8665C28.0256 26.5606 27.908 26.2659 27.6955 26.0458ZM11.704 21.0373C9.85805 21.0373 8.05355 20.49 6.51869 19.4644C4.98383 18.4388 3.78755 16.9812 3.08113 15.2757C2.37472 13.5703 2.18989 11.6937 2.55001 9.88317C2.91014 8.07268 3.79906 6.40964 5.10435 5.10435C6.40964 3.79906 8.07268 2.91014 9.88317 2.55001C11.6937 2.18989 13.5703 2.37472 15.2757 3.08113C16.9812 3.78755 18.4388 4.98383 19.4644 6.51869C20.49 8.05355 21.0373 9.85805 21.0373 11.704C21.0346 14.1785 20.0503 16.5509 18.3006 18.3006C16.5509 20.0503 14.1785 21.0346 11.704 21.0373Z" fill="#6D6D6D"/>
	        				</svg>
	        			</button>
						
						<!-- Модальное окно -->
						<Modal :modalData="modalData" :isModalVisible="isModalVisible" @close="closeModal" @submit="submitModal"  @update-child-input="updateChildInput"/>
						
	        		</div>
	        	</div>
	        </div>
	    </header>
</template>

<script>
	import { setupCalendar, Calendar, DatePicker } from 'v-calendar';
	import 'v-calendar/style.css';
	import Modal from './modalOrder.vue'
	import { ref } from 'vue';
	import { format } from 'date-fns';
   export default {
	components: {
		DatePicker,
		Modal
	},
	props: {
    bannerId: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      selectedCity: "",
      cities: [
        { id: 0, name: 'Винницкая область' },
        { id: 1, name: 'Волынская область' },
        { id: 2, name: 'Днепропетровская область' },
        { id: 3, name: 'Донецкая область' },
		{ id: 4, name: 'Житомирская область' },
		{ id: 5, name: 'Закарпатская область' },
		{ id: 6, name: 'Запорожская область' },
		{ id: 7, name: 'Ивано-Франковская область' },
        // Можно добавить больше городов по мере необходимости
      ],
	  input1: '',
      input2: '',
	  input3: '',
      modalData: {},
      isModalVisible: false,
	  range: null,
	  childInput1: null,
	  childInput2: null,
	  bannerId: 'header__banner',
	  bannerImages: ["/public/banner1.png", "/public/banner2.png", "/public/banner3.png"],
      currentIndex: 0
    };
  },
  computed: {
      uniqueCities() {
        const uniqueNames = new Set();
        return this.cities.filter(city => {
          if (!uniqueNames.has(city.name)) {
            uniqueNames.add(city.name);
            return true;
          }
          return false;
        });
      },
     	modalValues() {
			return [this.input1, this.input2, this.input3, this.childInput1, this.childInput2];
  		},
		  getCurrentBanner() {
      return this.bannerImages[this.currentIndex];
    }
    },
    methods: {
	 	updateInput(name, value) {
      		this[name] = value;
  	  	},
			updateInputPerson(name, value) {
      		this[name] = value.target.value;
  	  	},
		updateInputStart(event) {
			this.range = { ...this.range, start: event };
      		this.modalData.updateChildInput = event;
      		this.$emit('childInputChanged', 'childInput1', event);

      		// Вывод в консоль
      		console.log('Информация о заезде:', event);
   		},

		   updateInputEnd(event) {
     		this.range = { ...this.range, end: event };
      		this.modalData.updateChildInput = event;
      		this.$emit('childInputChanged', 'childInput2', event);

      		// Вывод в консоль
      		console.log('Информация об отъезде:', event);
    	},

     	openModal() {
        	this.modalData = {
        		input1: this.input1,
       			input2: this.input2,
				input3: this.input3,
        		childInput1: this.range.start,
    			childInput2: this.range.end
        	};
        this.isModalVisible = true;
      	},

      	closeModal() {
       		this.isModalVisible = false;
    	},

      	submitModal() {
        	// Логика обработки отправки запроса
        	this.isModalVisible = false;
      	},

		formatDate(date) {
     	 	return format(date, 'dd.MM.yyyy');  // Используем функцию format из date-fns
    	},
		
		updateChildInput(name, value) {
      		this.modalData[name] = value;
    	},
		startBannerRotation() {
   		setInterval(this.changeBanner, 10000);
   		},
   		changeBanner() {
   		  this.currentIndex = (this.currentIndex + 1) % this.bannerImages.length;
   		}

	},
	mounted() {
		this.startBannerRotation();
  },
};
</script>

<style scoped>

* {
	/* user-select: none; */
}
    
/* Работа с header */

.mask--for--banner {
	-webkit-mask-image: linear-gradient(black, transparent);
  mask-image: linear-gradient(black, transparent);
}

/* Задний фон */

.header__banner {
	background-image: url(../assets/banner1.png);
	background-size: cover;
	background-repeat: no-repeat;
	width: auto;
	height: 763px;
	border-radius: 0px 0px 25px 25px;
	transition: background-image 0.5s ease;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}

.header__banner__info {
	display: flex;
	flex-direction: column;
	align-items: self-start;
	justify-content: center;
	width: auto;

}

.info__title {
	font-size: 96px;
	font-weight: bold;
	color: var(--white);
}

.info__search {
	display: flex;
	flex-direction: row;
	flex-wrap: nowrap;
	align-items: center;
	margin-top: 40px;
	gap: 15px
}

.search__parametr--city {
	background-color: var(--gray);
	padding-top: 19px;
	padding-bottom: 19px;
	padding-left: 12px;
	padding-right: 45px;
	display: flex;
	border-radius: 15px;
}
.search__parametr--city select {
	background-color: var(--gray);
	border: var(--gray);
	font-size: 20px;
	font-weight: 400;
	font-family: 'Montserrat', sans-serif;
	margin-left: 3px;
	color: var(--dark);
	width: 285px;
}
.search__parametr--data {
	background-color: var(--gray);
	display: flex;
	padding-top: 19px;
	padding-bottom: 19px;
	padding-left: 12px;
	padding-right: 45px;
	border-radius: 15px;
	align-items: center;
}

.parametr--data__calendar {
	background-color: var(--gray);
	display: flex;
	align-items: center;
	gap: 10px;
	outline: none;
}

.calendar__input{
	width: 100px;
	background-color: var(--gray);
	border: var(--gray);
	color: var(--dark);
	display: flex;
	font-size: 20px;
	font-weight: 400;
	font-family: 'Montserrat', sans-serif;
	outline: none;
}

.search__parametr--data {
	background-color: var(--gray);
	display: flex;
	border-radius: 15px;
	align-items: center;
	gap: 10px;
}


.date--search--output{
	width: 80px;
	background-color: var(--gray);
	border: var(--gray);
	color: var(--dark);
	font-size: 20px;
	font-weight: 400;
	font-family: 'Montserrat', sans-serif;
}

.parametr--city__select-menu {
  	border: 1px solid #ccc;
  	border-radius: 4px;
  	outline: none;
  	cursor: pointer;
	height: auto;
}

.search__parametr--person {
	background-color: var(--gray);
	padding-top: 19px;
	padding-bottom: 19px;
	padding-left: 12px;
	padding-right: 45px;
	border-radius: 15px;
	display: flex;
	align-items: center;
	gap: 10px;
}

.person__human {
	background-color: var(--gray);
	border: 0 solid;
	font-size: 20px;
	font-weight: 400;
	font-family: 'Montserrat', sans-serif;
	color: var(--dark);
	max-width: 120px;
	width: auto;
	min-width: auto;
	outline: none;
}

.person__kids {
	background-color: var(--gray);
	border: var(--gray);
	border: 0 solid;
	font-size: 20px;
	font-weight: 400;
	font-family: 'Montserrat', sans-serif;
	color: var(--dark);
	max-width: 116px;
	min-width: 50px;
	outline: none;
}

.search__button {
	display: flex;
	padding: 20px;
	align-items: center;
	background-color: var(--orange);
	border-radius: 15px;
	border: 0 solid;
	transition: 0.3s;
}

.search__button:active {
	transform: scale( 1.05);
}

.search__button:hover {
	transform: scale( 1.05);
}

@media screen and (max-width: 414px) {
		.header__banner {
		width: auto;
		height: 768px;
		display: flex;
		flex-direction: column;
		justify-content: center;
	}	

	.info__search {
		display: flex;
		flex-direction: column;
		flex-wrap: nowrap;
		align-items: center;
		margin-top: 40px;
		gap: 15px
	}

	.header__banner__info {
		display: flex;
		align-items: center;
		
	}

	.info__title {
		display: flex;
		text-align: center;
		font-size: 60px;
		font-weight: bold;
		color: var(--white);
	}
	
}

</style>