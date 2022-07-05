<template>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="page-title">Profile</h4>
                            </div>
                            <div>
                                <a href="javascript:void(0);" @click="$router.back()"
                                   class="btn btn-outline-secondary me-1">
                                    <i class="mdi mdi-arrow-left-thick"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" v-model="family.name"
                                           placeholder="Name"/>
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="surname" v-model="family.surname"
                                           placeholder="Surname"/>
                                    <label for="surname">Surname</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone" v-model="family.phone"
                                           placeholder="Phone"/>
                                    <label for="phone">Phone</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="birth_date" v-model="family.birth_date"/>
                                    <label for="birth_date">Birth date</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" disabled v-model="family.email"
                                           placeholder="Email"/>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" v-model="family.password"
                                           placeholder="Password"/>
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password_confirmation" v-model="family.password_confirmation"
                                           placeholder="Phone"/>
                                    <label for="password_confirmation">Password Confirmation</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-primary" @click="update()">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Profile",
    data() {
        return {
            family: {
                password: '',
                password_confirmation: ''
            },
        }
    },
    methods: {
        getFamily() {
            axios.get('family/' + this.auth.id).then((response) => {
                this.family = response.data.data;
                this.$.appContext.config.globalProperties.auth = response.data.data;
            }).catch((error) => {
                this.$root.errorHandler(error);
            });
        },
        update() {
            axios.put('family/' + this.family.id, this.family)
                .then((response) => {
                    this.getFamily();
                    this.$root.successHandler(response);
                })
                .catch((error) => {
                    this.$root.errorHandler(error);
                });
        }
    },
    created() {
        this.getFamily();
    }
}
</script>

<style scoped>

</style>
