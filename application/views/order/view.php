<div class="container">
    <div class="card" style="margin-top: 1rem;">
        <h5 class="card-header">Details Order</h5>
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
                        <th scope="col">Product Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($order_details as $key => $ord) {
                    ?>

                        <tr>
                            <th scope="row"><?= $key ?></th>
                            <td><?= $ord->order_code ?></td>
                            <td><?= $ord->title ?></td>

                            <td>
                                <img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/product/' . $ord->image) ?>" alt="">
                            </td>
                            <td><?= number_format($ord->price, 0, ',', '.'); ?> vnd</td>
                            <td><?= $ord->qty ?></td>
                            <td><?= number_format($ord->qty * $ord->price, 0, ',', '.');  ?> vnd</td>


                        </tr>
                    <?php } ?>
                    <tr><td></td>
                    <td></td>
                        <td>
                            <select class="xulidonhang form-control" name="" id="">
                                <option value="0">--- Xu li don hang ---</option>
                                <option value="2">Dang giao hang</option>
                                <option value="3">Huy don</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>