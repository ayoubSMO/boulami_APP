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
								      									<th scope='col'>cin_doc</th>
										<th scope='col'>cin_pat</th>
										<th scope='col'>date</th>
										<th scope='col'>ord</th>
	
								    </tr>
								  </thead>
								  <tbody>
                                    <tr v-for="consultatio in consultation" :key="consultatio.cin_pat" >
																			<td>{{consultatio.cin_doc}}</td>
										<td>{{consultatio.cin_pat}}</td>
										<td>{{consultatio.date}}</td>
										<td>{{consultatio.ord}}</td>
	
										<td><button  class="btn btn-primary" @click="selectConsultatio(consultatio)"><em class="fa fa-file-o"></em></button></td>
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

                <consultatioForm-component></consultatioForm-component>	

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>



        </div>
<consultatioEdit-component  :consultatio="consultatio" :editMethod="editMethod" @toggleEdit="editMethod = !editMethod" v-if="editMethod" ></consultatioEdit-component>

    </div>
</template>

<script>
    export default {
		props: [
			
		],
        mounted() {
            console.log('consultatio Component mounted.')
        },
        data()
        {
            return {
				consultation : [],
				consultatio: '',
				editMethod: false,
                errors: '',
            }
        }
        ,
        created()
        {
            axios.get('http://localhost:8000/api/consultation'
            ).then(response => 
                this.consultation = response.data
            ).catch(error => this.errors = error)
		}
		,
		methods:{
			selectClient(consultatio){
				this.editMethod = !this.editMethod;
				this.consultatio = consultatio;
			}
		}
    }
   
</script>
