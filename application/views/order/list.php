<div class="container">
    <div class="card" style="margin-top: 1rem;">
        <h5 class="card-header">List Order</h5>
        <div class="card-body">


            <?php
            if ($this->session->flashdata('success')) {
            ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php
            } elseif ($this->session->flashdata('error')) {
            ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php
            }
            ?>
       
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($order as $key => $ord) {
                    ?>
                    
                        <tr>
                            <th scope="row"><?= $key ?></th>
                            <td><?= $ord->order_code ?></td>
                            <td><?= $ord->name ?></td>
                            <td><?= $ord->phone ?></td>
                            <td><?= $ord->address ?></td>
                            <td><?php
                                if ($ord->status == 1) {
                                    echo '<span class="text text-primary">Dang xu ly</span>';
                                } elseif($ord->status == 2) {
                                    echo '<span class="text text-success">Dang giao hang</span>';
                                }else{
                                    echo '<span class="text text-danger">Da huy</span>';
                                }
                                ?></td>
                            <td>
                                <a href="<?php echo base_url('order/view/' . $ord->order_code) ?>" class="btn btn-warning">View</a>
								<a href="<?php echo base_url('order/print_order/' . $ord->order_code) ?>" class="btn btn-success">Print</a>
                                <a onclick="return confirm('Are you sure?')" href="<?php echo base_url('order/delete/' . $ord->order_code) ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
