<template>
        <form class="form-horizontal" v-on:submit.prevent="onSubmit" id="form">
             <fieldset>		
                 <input type="hidden" name="_method" value="put" v-if="editMethod">	

<div class="form-group row">
            <label for="uuid" class="col-sm-2 col-form-label">uuid</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="uuid" name="uuid" v-model="failed_job.uuid" >
            <p style="color:red;" v-if="errors" >{{errors.uuid}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="connection" class="col-sm-2 col-form-label">connection</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="connection" name="connection" v-model="failed_job.connection" >
            <p style="color:red;" v-if="errors" >{{errors.connection}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="queue" class="col-sm-2 col-form-label">queue</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="queue" name="queue" v-model="failed_job.queue" >
            <p style="color:red;" v-if="errors" >{{errors.queue}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="payload" class="col-sm-2 col-form-label">payload</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="payload" name="payload" v-model="failed_job.payload" >
            <p style="color:red;" v-if="errors" >{{errors.payload}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="exception" class="col-sm-2 col-form-label">exception</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="exception" name="exception" v-model="failed_job.exception" >
            <p style="color:red;" v-if="errors" >{{errors.exception}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="failed_at" class="col-sm-2 col-form-label">failed_at</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="failed_at" name="failed_at" v-model="failed_job.failed_at" >
            <p style="color:red;" v-if="errors" >{{errors.failed_at}}</p>
            </div>
        </div>
        	
        <input type='hidden' name='_token' :value='token' />

        <button class='btn btn-primary'  @click='addFailed_job()' name='save'>Save</button>

        </fieldset>
  
    </form>
</template>


<script>
    export default {
    props:[
        'editMethod',
        'oldFailed_job'
    ],
    mounted() {
        console.log('failed_jobForm mounted.');
        if(this.editMethod)
            this.client = this.oldClient;
        },

    data()
    {
        return {
            token: $('meta[name="csrf-token"]').attr('content'),
            failed_job : {
                
				uuid : '',
				connection : '',
				queue : '',
				payload : '',
				exception : '',
				failed_at : '',
            },
            errors: '',
            }
        },
        created()
        {
        
        },
    methods: {
        addFailed_job()
        {   
            var url = 'http://localhost:8000/api/failed_jobs/';
            var type = 'post';
            if(this.editMethod) {url+=this.failed_job.id;type='put'}
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
        