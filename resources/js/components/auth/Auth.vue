<template>
    <router-view></router-view>
</template>

<script>
export default {
    name: "Auth",
    methods: {
        successHandler(response) {
            this.$swal.fire({
                icon: 'success',
                title: response.data.message,
                showConfirmButton: false,
                timer: 1250
            });
        },
        errorHandler(error) {
            this.$swal.fire({
                icon: 'warning',
                title: response.data.message,
                showConfirmButton: false,
                timer: 1250
            });
        },
    }
}
</script>

<style scoped>

</style>
