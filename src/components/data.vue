<template>
  <div>
    <DatePicker v-model="range" :range="true">
      <template #default="{ inputValue, inputEvents }">
        <div class="header__banner--info__search__parametr--data">
          <input
            @input="updateChildInputStart($event)"
            class="date--search--input"
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
            @input="updateChildInputEnd($event)"
            class="date--search--input"
            :value="inputValue.end"
            v-on="inputEvents.end"
            placeholder="Від'їзд"
          />
        </div>
      </template>
    </DatePicker>
  </div>
</template>

<script>
import { setupCalendar, Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';

export default {
  components: {
    DatePicker,
  },
  data() {
    return {
      range: null,
      modalData: {},
    };
  },
  methods: {
    updateChildInputStart(value) {
      this.range = { ...this.range, start: value };
      this.modalData.updateChildInput = value;
      this.$emit('childInputChanged', 'childInput1', value);
    },
    updateChildInputEnd(value) {
      this.range = { ...this.range, end: value };
      this.modalData.updateChildInput = value;
      this.$emit('childInputChanged', 'childInput2', value);
    },
  },
};
</script>


  <style>
    .date--search--input{
	width: 100px;
	background-color: var(--gray);
	border: var(--gray);
	color: var(--dark);
	display: flex;
	font-size: 20px;
	font-weight: 400;
	font-family: 'Montserrat', sans-serif;
}

.header__banner--info__search__parametr--data {
	background-color: var(--gray);
	display: flex;
	border-radius: 15px;
	align-items: center;
	gap: 10px;
}

</style>