<template>

        <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details R_d_v_
                </div>
                <div class="panel-body">
                     <!-- Name input-->
                 <r_d_v_Form-component :oldR_d_v_="r_d_v_" :editMethod="editMethod"></r_d_v_Form-component>
                </div>
            </div>
        </div>
        <div class="col-sm-8">

        <div class="panel panel-default">
            <div class="panel-heading">
                    Editer Produit 
                    <button class="btn btn-md btn-link pull-right" @click="changeValue()" ><em class="fa fa-arrow-left"></em> Retour</button>
            </div>
            <div class="panel-body">
                <div class="row">
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-teal panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                    <h3>CA</h3>
                    <div class="text-muted">CA</div>
                    
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-blue panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
                    <h3>Ventes</h3>
                    <div class="text-muted">sales</div>
                    
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-orange panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                    <h3 >Fidélité</h3>
                    <div class="text-muted">sales</div>
                    
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-red panel-widget ">
                <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
                    <h3>Dernier achat</h3>
                    <div class="text-muted">lastSale</div>
                    
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <hr>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: [
            'editMethod',
            'r_d_v_'
        ],
        mounted() {
            console.log('r_d_v_ edit Component mounted.')
        },
        methods: {
            changeValue(){
                this.$emit('toggleEdit');
            },
        }
    }
</script>


      
