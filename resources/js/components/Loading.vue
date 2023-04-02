<script setup>
import { ref } from 'vue';
let visible = ref(false);

window.addEventListener("isLoading", function(event) {
    visible.value = event.detail.visible;
  });
</script>

<template>
	<div v-if="visible" class="fixed inset-0 z-50 opacity-90 bg-gray-800 flex justify-center items-center transition-all">
		<span class="loader"></span>
	</div>
</template>

<style scoped>
	.loader {
		width: 48px;
		height: 48px;
		border-radius: 50%;
		display: inline-block;
		border-top: 4px solid #FFF;
		border-right: 4px solid transparent;
		box-sizing: border-box;
		animation: rotation 1s linear infinite;
	}

	.loader::after {
		content: '';  
		box-sizing: border-box;
		position: absolute;
		left: 0;
		top: 0;
		width: 48px;
		height: 48px;
		border-radius: 50%;
		border-left: 4px solid #FF3D00;
		border-bottom: 4px solid transparent;
		animation: rotation 0.5s linear infinite reverse;
	}

	@keyframes rotation {
		0% {
			transform: rotate(0deg);
		}
		100% {
			transform: rotate(360deg);
		}
	} 
</style>