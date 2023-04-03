export default function useAlert() {
    
    const dialog = async (msg) => {
        let response = false;
        
        await Swal.fire({
            title: msg,
            icon: 'question',
            showDenyButton: true,
            confirmButtonText: 'Sí',
        }).then((result) => {
            if (result.isConfirmed) {
                response = true;
            }
        });

        return response;
    };

    return {
        dialog
    }
}