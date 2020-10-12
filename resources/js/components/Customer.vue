<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-4">
                                        Customer Table
                                      </div>  

                                       <div class="col-lg-4">
                                        <button class="btn btn-success" >Add</button>
                                      </div>  
                                </div>
                        
                    
                    </div>

                    <div class="card-body">
                      <table class="table tble-bordered table-striped ">
                                <thead>
                                    <tr>
                                    <th scope="col">serail</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Pnone</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>

                                    <td>Mark</td>
                                    <td>Otto</td>

                                    <td> 

                                        <i style="cursor:pointer " class="fa fa-edit"></i>

                                        <i style="cursor:pointer " class="fa fa-trash-alt ml-2"></i>

                                     </td>


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
                      <label for="">Customer Name</label>
                      <input type="text"  v-model="name" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                     <div class="form-group">
                      <label for="">Customer phone</label>
                      <input type="text"  v-model="phone" class="form-control" placeholder="" aria-describedby="helpId">
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
        
    }
</script>
