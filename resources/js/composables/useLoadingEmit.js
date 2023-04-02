export default function useLoadingEmit() {
    const event = new CustomEvent("isLoading", {detail: {visible: false}})

    const dispatchLoadingEmit = (visible) => {
        event.detail.visible = visible;
        window.dispatchEvent(event);
    }

    return {
        dispatchLoadingEmit
    }
}