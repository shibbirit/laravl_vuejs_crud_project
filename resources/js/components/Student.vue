<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-4">
                                        Student Table
                                      </div>  

                                       <div class="col-lg-4">
                                        <button class="btn btn-success" @click="modalOpen">Add</button>
                                      </div>  
                                </div>
                        
                    
                    </div>

                    <div class="card-body">
                      <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    </tr>
                                </tbody>
                                </table>
                    </div>
                </div>
            </div>
        </div>

             <div class="modal" tabindex="-1" style="display:block;" v-if="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form @submit.prevent="submit">
                    <div class="form-group">
                      <label for="">Student Name</label>
                      <input type="text"  v-model="name" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                     <div class="form-group">
                      <label for="">Student Roll</label>
                      <input type="text"  v-model="roll" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <button class="btn btn-block btn-success" type="submit">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
    </div>
   
</template>

<script>
    export default {
        mounted() {
            console.log(' mounted.')
        },
        created(){
            
            console.log(this.name)
        },
        data(){
            return {
                name:'',
                roll:'',
                modal:false
            }
        },
        methods:{
            modalOpen(){
                console.log('metho');
               this.modal=true;
   
            },
            submit(){
               axios.post('/student/store',{
                   name:this.name,
                   roll:this.roll,
               })
               .then(resp=>{
                    console.log(resp)
               })
               .catch(error=>{
                   console.log(error)
               })
            }
        }
    }
</script>
