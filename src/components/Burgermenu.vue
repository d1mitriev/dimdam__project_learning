<template>


</template>

<script>
    import { ref } from 'vue';
    export default {
        setup() {
    const isMenuVisible = ref(false);

    const toggleMenu = () => {
      isMenuVisible.value = !isMenuVisible.value;
    };

    return {
      isMenuVisible,
      toggleMenu,
    };
  },
    }
</script>

<style scoped>
    .mobilenavbar__menu--content {
        display: flex;
        flex-direction: column;
    }
    .mobilenavbar__menu-icon {
		padding: 15px;
		background-color: #FFBC57;
		border-radius: 5px;
	}

    .mobilenavbar__menu-icon-close {
		padding: 15px;
		background-color: #3a3a3a;
		border-radius: 5px;
    opacity: 0.9;
    display: flex;
    align-items: center;
    justify-content: center;
	}
</style>