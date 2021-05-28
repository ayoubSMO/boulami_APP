<template>
        <form class="form-horizontal" v-on:submit.prevent="onSubmit" id="form">
             <fieldset>		
                 <input type="hidden" name="_method" value="put" v-if="editMethod">	

<div class="form-group row">
            <label for="migration" class="col-sm-2 col-form-label">migration</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="migration" name="migration" v-model="migration.migration" >
            <p style="color:red;" v-if="errors" >{{errors.migration}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="batch" class="col-sm-2 col-form-label">batch</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="batch" name="batch" v-model="migration.batch" >
            <p style="color:red;" v-if="errors" >{{errors.batch}}</p>
            </div>
        </div>
        	
        <input type='hidden' name='_token' :value='token' />

        <button class='btn btn-primary'  @click='addMigration()' name='save'>Save</button>

        </fieldset>
  
    </form>
</template>


<script>
    export default {
    props:[
        'editMethod',
        'oldMigration'
    ],
    mounted() {
        console.log('migrationForm mounted.');
        if(this.editMethod)
            this.client = this.oldClient;
        },

    data()
    {
        return {
            token: $('meta[name="csrf-token"]').attr('content'),
            migration : {
                
				migration : '',
				batch : '',
            },
            errors: '',
            }
        },
        created()
        {
        
        },
    methods: {
        addMigration()
        {   
            var url = 'http://localhost:8000/api/migrations/';
            var type = 'post';
            if(this.editMethod) {url+=this.migration.id;type='put'}
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
        