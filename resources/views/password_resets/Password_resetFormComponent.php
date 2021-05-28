<template>
        <form class="form-horizontal" v-on:submit.prevent="onSubmit" id="form">
             <fieldset>		
                 <input type="hidden" name="_method" value="put" v-if="editMethod">	

<div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">email</label>
            <div class="col-sm-10">
            <input type="email"  class="form-control" id="email" name="email" v-model="password_reset.email" >
            <p style="color:red;" v-if="errors" >{{errors.email}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="token" class="col-sm-2 col-form-label">token</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="token" name="token" v-model="password_reset.token" >
            <p style="color:red;" v-if="errors" >{{errors.token}}</p>
            </div>
        </div>
        	
        <input type='hidden' name='_token' :value='token' />

        <button class='btn btn-primary'  @click='addPassword_reset()' name='save'>Save</button>

        </fieldset>
  
    </form>
</template>


<script>
    export default {
    props:[
        'editMethod',
        'oldPassword_reset'
    ],
    mounted() {
        console.log('password_resetForm mounted.');
        if(this.editMethod)
            this.client = this.oldClient;
        },

    data()
    {
        return {
            token: $('meta[name="csrf-token"]').attr('content'),
            password_reset : {
                
				email : '',
				token : '',
            },
            errors: '',
            }
        },
        created()
        {
        
        },
    methods: {
        addPassword_reset()
        {   
            var url = 'http://localhost:8000/api/password_resets/';
            var type = 'post';
            if(this.editMethod) {url+=this.password_reset.;type='put'}
            $.ajax({
                url: url,
                type: type,
                datatype: 'json',
                data : $("#form").serialize(),
                success: function(data){
                    console.log(data);
                },
                error: function (request, status, error) {
                    console.log(request);
                    console.log(error);
                    this.errors = request.responseJSON.errors;
                }.bind(this)

               })
        },
        onSubmit(){}
        },
       
        
       
    }
</script>
        