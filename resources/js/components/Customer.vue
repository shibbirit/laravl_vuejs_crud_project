<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                         <div class="row  ">
                        
                                     <h5 style="margin-left: 155px;margin-bottom: 18px; margin-top: 10px;" class="heading">  Customer Information SPA Application</h5>
                        
                            </div>       
                    <div class="row">
                        <div class="col-md-6">


                            <form  id="searchForm" >
                                <input type="text" @keyup="searchCustomer" v-model="search" class="form-control" id="">
                                <button type="submit" style="margin-top:-65px;margin-left: 325px;" class="btn btn-primary" > <i  class="fa fa-search" style="cursor:pointer;" ></i> </button>
                            </form>


                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary float-right " @click="modal=true"><i class="fa fa-lg fa-plus"></i></button>
                        </div>
                    </div>
                    </div>

                    <div class="card-body">
                      <table class="table tble-bordered table-striped ">
                                <thead>
                                    <tr>
                                    <th scope="col">serail</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(customer,index ) in customerList " v-bind:key="index" >
                                    <th scope="row"> {{ index }} </th>

                                    <td> {{  customer.name }}  </td>
                                    <td> {{  customer.phone }}  </td>

                                    <td> 

                                        <router-link :to="{name:'editCustomer',params:{id:customer.id}}"><i style="cursor:pointer " v-on:click="editAction(customer)"  class="fa fa-edit"></i></router-link>

                                        <i style="cursor:pointer " v-on:click="destroyCustomer(customer,index)" class="fa fa-trash-alt ml-2"></i>

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
                    <h5 class="modal-title">Add New Custoemr info </h5>
                    <button type="button" class="close" data-dismiss="modal" v-on:click="modal=false" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form @submit.prevent="addCustomer()">
                    <div class="form-group">
                      <label for="">Customer Name</label>
                      <input type="text"  v-model="name" class="form-control"  aria-describedby="helpId">
                    </div>
                     <div class="form-group">
                      <label for="">Customer phone</label>
                      <input type="text"  v-model="phone" class="form-control"  aria-describedby="helpId">
                    </div>
                    <button class="btn btn-block btn-success" type="submit">Submit</button>
                 </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="modal=false">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
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
            this.getCustomerList() ;
        },

        data(){

            return {

                modal:false,
                name :'', 
                phone:'' ,
                customerList :'',
                search:'',

            }
        },

        methods:{

            getCustomerList(){

                axios.get('customer/data')
                .then(resp =>{

                     if (resp.data.success == "OK") {
                         
                         this.customerList = resp.data.customers 

                     }
                })

            },

            addCustomer(){
                  
                axios.post('customer/add',{

                     name : this.name ,
                     phone : this.phone ,
                })
                .then(resp => {

                     if (resp.data.success == "OK") {
                         
                          alert(resp.data.message);
                          this.getCustomerList();
                          this.modal=false ;
                          this.name='' ;
                          this.phone='';

                     }
                })

                   
            },

            editAction(customer){

                 

            },
            
            searchCustomer(){

                axios.get('customer/data/search/'+this.search)
                .then(resp =>{
                   
                   

                   if (resp.data.success == "OK") {
                       
                       this.customerList = resp.data.searchingCustomer ;
                       console.log(this.customerList);

                   }else{
                       this.getCustomerList();
                       
                   }

                })
                .catch()
            },

          destroyCustomer(customer,index){

              axios.delete('customer/data/remove/'+customer.id)
              .then( resp=>{

                   if (resp.data.success == "OK") {

                         this.customerList.splice(index,1) ;  
                         alert(resp.data.message) ;

                   
                       
                   }
              })
          },

        },


        
    }
</script>
