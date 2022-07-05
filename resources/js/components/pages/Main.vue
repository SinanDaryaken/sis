<template>
    <Header></Header>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="content-page">
                <div class="content">
                    <router-view></router-view>
                </div>
                <Footer></Footer>
            </div>
        </div>
    </div>
</template>

<script>
import Header from '../includes/Header.vue';
import Footer from '../includes/Footer.vue';

export default {
    name: "Main",
    components: {
        Header,
        Footer,
    },
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
                title: error.response.data.message,
                showConfirmButton: false,
                timer: 1250
            });
        },
    }
}
</script>

<style scoped>

</style>
