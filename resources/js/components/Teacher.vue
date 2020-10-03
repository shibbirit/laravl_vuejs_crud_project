<template>

<div class="container">
    
<div class="card">
    <div class="card-body">
        <p class="card-title">Teachers information </p> <button @click="modal=true" class="btn btn-info float-right  "> Add new </button>        </div>
       
  <div class="table-responsive" >

            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                <th scope="col">Serial No</th>
                <th scope="col">Name </th>
                <th scope="col">Designation</th>
                <th scope="col">Email</th>
                <th scope="col">Institute</th>
                <th scope="col ">Action</th>


                </tr>
            </thead>
            <tbody>
                <tr v-for="(teacher,index)  in teacherList" v-bind:key="teacher.id">
                <th scope="row">{{index+1}}</th>
                <td>{{teacher.name}}</td>
                <td>Web programmer </td>
                <td>fahiminstitute</td>
                <td>fahimmbpi@gmail.com</td>
                <td> 

                  <i style="cursor:pointer;" class="fa fa-edit " @click="update(index)"> </i>  
                  <i @click="remove(index)" style="cursor:pointer;" class="fa fa-trash-alt ml-3"> </i> </td>


                </tr>
              
            </tbody>
            </table>


    </div>
    
</div>


<div class="modal" tabindex="-1" style="display:block;" v-if="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Teacher </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form class="form" @submit.prevent="formSubmit()">
      <div class="modal-body">
         
      
       
          <div class="form-group">
           <label for="my-input">Name</label>
           <input id="my-input" class="form-control" type="text"  v-model="name">
           </div>
            <div class="form-group">
           <label for="my-input">Designation</label>
           <input id="my-input" class="form-control" type="text" v-model="designation">
           </div>
           <div class="form-group">
           <label for="my-input">Email</label>
           <input id="my-input" class="form-control" type="email" v-model="email">
           </div>
           <div class="form-group">
           <label for="my-input">Institute</label>
           <input id="my-input" class="form-control" type="text" v-model="institute">
           </div>

      
              <button type="submit" class="btn btn-primary float-right">Insert</button> 
      </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="modal=false" >Close</button>
   
        
       
      </div>
    </div>
  </div>
</div>


</div>


</template>




<script>

          export default {

          
           mounted(){

               console.log('mounted'); 

               this.getTeacherList();
           },
          data() {
                  return { 

                         modal : false,
                         name : '' ,  
                         designation : '' ,  
                         email : '' ,  
                         institute : '' , 
                         teacherList:'', 
                         updateMode:false

                  }
          },

            methods: {        
                        
                        formSubmit(){
                            
                            axios.post('/teacher/add',{
                                name: this.name,
                                designation: this.designation,
                                email: this.email,
                                institute: this.institute,

                            })
                            .then(resp => {
                              if(resp.data.success="OK"){
                                    this.modal=false;
                                    this.getTeacherList();
                              }
                            })
                            .catch(error =>{

                                console.log(error);
                            })
                        },
                        getTeacherList(){
                            axios.get('teacher/data')
                            .then(resp=>{
                                if(resp.data.success == "OK"){
                                   this.teacherList=resp.data.data;
                                }
                                console.log(resp);
                            })
                            
                        },

                       remove(index){
                             
                           axios.delete('teacher/data/remove/'+this.teacherList[index].id)
                           .then(resp=>{
                                    
                                    if (resp.data.success== "OK") {
                                       console.log(resp.data.messaage)
                                      return   this.getTeacherList()
                                    }

                           })
                           

                       }
                     
                      
                    },
                  



          }
          

</script>