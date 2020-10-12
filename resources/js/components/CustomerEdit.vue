<template>
    <div v-if="loading">
        <h3>Loading.........</h3>
    </div>
    <div class="modal" v-else  tabindex="-1" style="display:block;" >
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header"> 
                    <h5 class="modal-title">Edit Custoemr info </h5>
                    <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form @submit.prevent="updateCustomer()">
                    <div class="form-group">
                      <label for="">Customer Name</label>
                      <input type="text"  v-model="name" class="form-control"  aria-describedby="helpId">
                    </div>
                     <div class="form-group">
                      <label for="">Customer phone</label>
                      <input type="text"  v-model="phone" class="form-control"  aria-describedby="helpId">
                    </div>
                    <button class="btn btn-block btn-success" type="submit">update</button>
                 </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal()" >Close</button>
                    
                </div>
                </div>
            </div>
            </div>

</template>


            <script>
export default {
  // props:[customer],
  mounted(){
      this.getEditingCustomer();
     
      console.log(this.$route.params.id);
  },

  data() {
    return {
       
        name : '',
        phone :'' ,
    
        
        

        loading:true,
    }
  },

  methods: {

    updateCustomer() {


    },

    getEditingCustomer(){
        axios.get('/find/editCustomer/'+this.$route.params.id)
        .then(resp=>{
            console.log(resp)
            this.name=resp.data.customer.name;
            this.phone=resp.data.customer.phone;
           
            this.loading=false;
            
        })
        .catch()
    },
    updateCustomer(){
              
           axios.put('/customer/udpate/data/'+this.$route.params.id,{

                  name : this.name ,
                  phone : this.phone ,

           })
           .then(resp => {
                  
                  if (resp.data.success == "OK") {
                      this.$router.push({path: '/customer',})
                      alert(resp.data.message) ;

                  }
                
           })
           .catch()    
    },

    closeModal(){

        this.$router.push({path: '/customer',}) ;
    }
     

  },
};
</script>