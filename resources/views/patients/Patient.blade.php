<template>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
        <div class="row"  v-if="!editMethod" >
        <div class="col-sm-10">
        <div class="panel panel-default">
            <!-- <div class="panel panel-default hidden"> -->
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                    <fieldset>
                        <!-- Name input-->
                        <div class="form-group">
                            <div class="col-md-4">
                                <input id="name" name="name" type="text" placeholder="Nom/Prenom/Email/Id" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">Recherch</button>
                            </div>
                            <div class="col-md-4 widget-right">
                            <button type="button" class="btn btn-success btn-lg pull-right"  data-toggle="modal" data-target="#CreateNewProduct">
                            <em class="fa fa-plus"></em> Cree Un Client</button>
                            </div>
                        </div>
                        
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Clients Actif</a></li>
							<li><a href="#tab2" data-toggle="tab">Clients Inactif</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1">
								<table class="table table-striped">
								  <thead>
								    <tr>
								      									<th scope='col'>cin</th>
										<th scope='col'>fname</th>
										<th scope='col'>lname</th>
										<th scope='col'>email</th>
										<th scope='col'>phone</th>
										<th scope='col'>fonction</th>
										<th scope='col'>login</th>
										<th scope='col'>password</th>
	
								    </tr>
								  </thead>
								  <tbody>
                                    <tr v-for="patient in patients" :key="patient.cin" >
																			<td>{{patient.cin}}</td>
										<td>{{patient.fname}}</td>
										<td>{{patient.lname}}</td>
										<td>{{patient.email}}</td>
										<td>{{patient.phone}}</td>
										<td>{{patient.fonction}}</td>
										<td>{{patient.login}}</td>
										<td>{{patient.password}}</td>
	
										<td><button  class="btn btn-primary" @click="selectPatient(patient)"><em class="fa fa-file-o"></em></button></td>
                                    </tr>
                                   
								</tbody>
								</table>
							</div>
						</div>
				</div><!--/.panel-->
			</div><!--/.col-->
		</div>

        <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="CreateNewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                    <center>
                        <h3 class="modal-title align-middle" id="exampleModalLongTitle">Créer un Client</h3>
                    </center>
              </div>
              <div class="modal-body">

                <patientForm-component></patientForm-component>	

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>



        </div>
<patientEdit-component  :patient="patient" :editMethod="editMethod" @toggleEdit="editMethod = !editMethod" v-if="editMethod" ></patientEdit-component>

    </div>
</template>

<script>
    export default {
		props: [
			
		],
        mounted() {
            console.log('patient Component mounted.')
        },
        data()
        {
            return {
				patients : [],
				patient: '',
				editMethod: false,
                errors: '',
            }
        }
        ,
        created()
        {
            axios.get('http://localhost:8000/api/patients'
            ).then(response => 
                this.patients = response.data
            ).catch(error => this.errors = error)
		}
		,
		methods:{
			selectClient(patient){
				this.editMethod = !this.editMethod;
				this.patient = patient;
			}
		}
    }
   
</script>
