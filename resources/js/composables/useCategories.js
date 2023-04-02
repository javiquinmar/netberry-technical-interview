import { ref, defineEmits } from 'vue';
import axios from 'axios';
import useLoadingEmit  from '@/composables/useLoadingEmit';
import { useToast } from "vue-toastification";

export default function useCategories() {
    const categories     = ref([]);
    const categoryErrors = ref('');

    const { dispatchLoadingEmit } = useLoadingEmit();

    const toast = useToast();

    const getCategories = async () => {
        dispatchLoadingEmit(true);

        try {
            const response  = await axios.get('/api/categories');
            categories.value = await response.data.data;
        } catch (e) {
            toast.error(e.response.data.message);
        } finally {
            dispatchLoadingEmit(false);
        }
    }

    return {
        categories,
        categoryErrors,
        getCategories,
    }
}