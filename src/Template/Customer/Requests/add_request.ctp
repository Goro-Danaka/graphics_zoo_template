<?php ?>
<?= $this->Flash->render(); ?>
<?= $this->Form->create($request, ['type' => 'file']); ?>
<?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Form Layouts</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Info</h4>
                    </div>
                    <div class="card-block">
                        <div class="mrg-top-40">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Project Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => FALSE,'style'=>'border-radius: 20px;','required']) ?>
                                            </div>
                                        </div>
                                    </div>                                   
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Design Type</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <?= $this->Form->control('work_type', ['options' => [''=>'Select Design Type','print' => 'Print', 'web' => 'Web','Flyer' => 'Flyer','Brochure' => 'Brochure','Webpage' => 'Webpage','App Design' => 'App Design','Business Card' => 'Business Card','Logo' => 'Logo',' T-shirt' => ' T-shirt','Infographic' => 'Infographic','Web Banner' => 'Web Banner','Facebook Cover' => 'Facebook Cover','Other' => 'Other',], 'class' => 'form-control select2', 'label' => FALSE,'style'=>'border-radius: 20px;','required']) ?>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Design Dimension(if known)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">                                                
                                                <?= $this->Form->control('design_dimension', ['class' => 'form-control', 'label' => FALSE,'style'=>'border-radius: 20px;']) ?>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Project Description</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">                                                
                                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => FALSE,'style'=>'border-radius: 20px;','required']) ?>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Attach Helpful Images</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">                                                
                                                <div class="form-group" id="addnewimage" style="position:relative;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <?= $this->Form->control('file[]', ['type' => 'file', 'class' => 'dropify', 'label' => FALSE, 'data-plugin' => 'dropify', 'data-height' => '200']) ?>
                                                        </div>      
                                                        <div class="col-md-3" style="position: absolute;left: 50%;bottom: 0;padding: 0px;border-radius: 5px;">
                                                                                                
                                                        <div class="btn-group addnewimage" style="border-radius: 3px;display: inline-block;">
                                                        <a class="btn btn-info flat-buttons waves-effect waves-button" style="border-radius: 5px 0px 0px 5px;border: #f83a5b;background: #fff;padding: 4px;">
                                                                <image src="<?= REQUEST_IMG_URL ?>image/attach_image.png" />
                                                        </a>
                                    
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= $this->Form->button('+ Add Request', ['type' => 'submit', 'class' => 'btn btn-success flat-buttons waves-effect waves-button','style'=>'border-radius: 20px;border: #f83a5b;background: #f83a5b;']) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">                                                
                                                <a href="<?= \Cake\Routing\Router::url(['controller' => 'Requests', 'action' => 'allRequests'], TRUE)?>">
                                                    <?= $this->Form->button('Cancel', ['type' => 'button', 'class' => 'btn btn-success flat-buttons waves-effect waves-button','style'=>'border-radius: 20px;border: #3b3939;;background: #3b3939;width: 127px;text-align: center;']) ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>

<style>
.dropify-wrapper{
	border-radius: 20px;
}
body{
	background:aliceblue;
}
</style>