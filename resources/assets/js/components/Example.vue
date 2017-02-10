<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Task</div>

                    <div class="panel-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="title" v-model="title" placeholder="Title"
                                               autofocus autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center">
                                        <button class="btn btn-primary" @click.prevent="add">Add Task</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            add() {
                axios.post('/tasks/store', {
                    title: this.title
                })
                .then(function (response) {
                    window.location = '/tasks';
                });
            }
        }
    }
</script>
