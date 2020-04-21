<template>
    <div class="row">
        <div class="col-md-4" v-for="course in courses">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" :src="'assets/uploads/course/banner/'+course.banner" :alt="course.name">
                <div class="card-body">
                    <h5 class="card-title"><a :href="'courses/'+course.slug" :title="course.name">{{course.name}}</a> </h5>
                    <p><i class="far fa-calendar-alt"></i> <strong>Start Date:</strong> {{course.course_start_date}}</p>
                    <p><i class="far fa-calendar-alt"></i> <strong>End Date:</strong>  {{course.course_end_date}}</p>
                    <p><i class="far fa-clock"></i> <strong>Total Hours:</strong> {{course.total_hour}}</p>

                </div>
                <div class="card-footer">
                    <h5> <strong>TK {{course.fees}}</strong></h5>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log("loaded")
        },
        data() {
            return {
                courses: [],
            }
        },
        created() {
            window.axios.get('/api/v1/courses').then(response => {
                this.courses = response.data.data;
                console.log(response.data.data);
            }).catch(function (error) {
                // handle error
                console.log(error);
            }).then(function () {
                // always executed
            });
        }
    }
</script>

<style scoped>

</style>