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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Students</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Student Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(item, index) in students">
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.surname }}</td>
                                <td>{{ item.student_number }}</td>
                                <td>
                                    <button class="btn" @click="student = item"></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Selected Student</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" v-model="student.name"
                                           placeholder="Name" disabled/>
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="surname" v-model="student.surname"
                                           placeholder="Surname" disabled/>
                                    <label for="surname">Surname</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone" v-model="student.phone"
                                           placeholder="Phone" disabled/>
                                    <label for="phone">Phone</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="student_number" v-model="student.student_number"
                                           placeholder="Student Number" disabled/>
                                    <label for="student_number">Student Number</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="birth_date" v-model="student.birth_date" disabled/>
                                    <label for="birth_date">Birth date</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "Dashboard",
    data() {
        return {
            student: {
                name: '',
                surname: '',
                phone: '',
                student_number: '',
                birth_date: '',
            },
            students: {}
        }
    },
    methods: {
        getStudents() {
            axios.get('students/get-by-family/' + this.auth.id).then((response) => {
                this.students = response.data.data;
            }).catch((error) => {
                this.$root.errorHandler(error);
            })
        }
    },
    created() {
        this.getStudents();
    }
}
</script>
