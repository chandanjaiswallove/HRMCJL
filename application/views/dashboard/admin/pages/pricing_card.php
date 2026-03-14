<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Pricing Card</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_playground') ?>">
                                <svg class="stroke-icon">
                                    <use href="modules/assets2/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active"> <a href="<?= base_url('pricing'); ?>">Pricing Card</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>







    <!-- Container-fluid starts-->
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <!-- CARD BODY -->
                        <div class="card-body">

                            <!-- ADD BUTTON -->
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#addCompanyLogoModal">
                                Add Pricing Card
                            </button>

                            <!-- ADD MODAL -->
                            <div class="modal fade" id="addCompanyLogoModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title">Add New Pricing Card</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <!-- INSERT MODAL -->
                                        <div class="modal-body">

                                            <form method="POST" action="<?php echo base_url('insertPricecard') ?>">
                                                <div class="row">

                                                    <!-- PLAN NAME -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Plan Name</label>
                                                        <input type="text" class="form-control" name="plan_name"
                                                            placeholder="Premium / Basic" required>
                                                    </div>

                                                    <!-- SMALL DESCRIPTION -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Small Description</label>
                                                        <input type="text" class="form-control" name="small_description"
                                                            placeholder="Short description" required>
                                                    </div>

                                                    <!-- PRICING -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Pricing</label>
                                                        <input type="number" class="form-control" name="pricing"
                                                            placeholder="₹999">
                                                    </div>

                                                    <!-- duration  -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Durations</label>
                                                        <input type="text" class="form-control" name="duration"
                                                            placeholder="1 years validity">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Package Sample Link</label>
                                                        <input type="url" class="form-control" name="plan_url"
                                                            placeholder="https://example.com">
                                                    </div>

                                                </div>

                                                <!-- ITEM LIST (LOOP) -->
                                                <div class="mb-3">
                                                    <label class="form-label">Item List</label>

                                                    <div id="itemWrapper">
                                                        <div class="d-flex mb-2">
                                                            <input type="text" name="item_list[]"
                                                                class="form-control me-2" placeholder="Feature text">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                onclick="removeItem(this)">Remove</button>
                                                        </div>
                                                    </div>

                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="addItem()">
                                                        + Add Item
                                                    </button>
                                                </div>

                                                <!-- FOOTER BUTTONS (SAME STYLE) -->
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ms-2">
                                                        Save Pricing Card
                                                    </button>
                                                </div>

                                            </form>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TABLE -->
                        <div class="table-responsive add-project custom-scrollbar">
                            <table class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>CARD ID</th>
                                        <th>Date</th>
                                        <th>Plan Name</th>

                                        <!-- ✅ NEW -->
                                        <th>Small Description</th>

                                        <th>Pricing</th>
                                        <th>Duration</th>
                                        <th>Sample Link</th>

                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (!empty($pricing_cards)): ?>
                                        <?php $i = 1;
                                        foreach ($pricing_cards as $row): ?>

                                            <tr>
                                                <!-- ID / SR -->
                                                <td><?= $i++; ?></td>

                                                <!-- DATE -->
                                                <td><?= date('d M Y', strtotime($row->created_at)); ?></td>

                                                <!-- PLAN NAME -->
                                                <td><?= $row->plan_name; ?></td>

                                                <!-- SMALL DESCRIPTION -->
                                                <td><?= $row->small_description; ?></td>

                                                <!-- PRICING -->
                                                <td><?= $row->pricing; ?></td>

                                                <!-- DURATION -->
                                                <td><?= $row->duration ?? '-'; ?></td>

                                                <!-- SAMPLE LINK -->
                                                <td>
                                                    <?php if (!empty($row->sample_url)): ?>
                                                        <a href="<?= $row->sample_url; ?>" target="_blank">
                                                            <?= parse_url($row->sample_url, PHP_URL_HOST); ?>
                                                        </a>
                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                </td>

                                                <!-- ACTION -->
                                                <td class="text-end">

                                                    <!-- EDIT -->
                                             
                                                    <a class="btn btn-primary btn-sm editPriceBtn" data-bs-toggle="modal"
                                                        data-bs-target="#editPriceModal" data-id="<?= $row->id ?>"
                                                        data-plan="<?= htmlspecialchars($row->plan_name) ?>"
                                                        data-desc="<?= htmlspecialchars($row->small_description) ?>"
                                                        data-price="<?= $row->pricing ?>"
                                                        data-duration="<?= htmlspecialchars($row->duration) ?>"
                                                        data-sample="<?= htmlspecialchars($row->sample_url) ?>"
                                                        data-items='<?= htmlspecialchars(json_encode(array_column($row->items ?? [], "item_text")), ENT_QUOTES, "UTF-8") ?>'>

                                                        <i class="fa fa-pencil"></i>
                                                    </a>


                                                    <!-- DELETE -->
                                                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#deletePrice_<?= $row->id; ?>">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>

                                                    <!-- DELETE MODAL -->
                                                    <div class="modal fade" id="deletePrice_<?= $row->id; ?>" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content bg-dark">

                                                                <div class="modal-header border-0">
                                                                    <h5 class="modal-title text-white">
                                                                        Delete <?= $row->plan_name; ?>
                                                                    </h5>
                                                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="modal-body text-center text-white">
                                                                    Are you sure you want to delete this pricing plan?
                                                                    </br> you cannot do undo..
                                                                </div>

                                                                <div class="modal-footer justify-content-center border-0">
                                                                    <button class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <a href="<?= base_url('deletePriceCard?id=' . $row->id); ?>"
                                                                        class="btn btn-primary">
                                                                        Yes, Delete
                                                                    </a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>














                                                </td>
                                            </tr>

                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center">No pricing plans found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>

                            </table>


                        </div>

                        <!-- EDIT MODAL -->
                        <div class="modal fade" id="editPriceModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Pricing Card </h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <form method="POST" action="<?php echo base_url('updatePriceCard') ?>">
                                            <div class="row">
                                                <input type="hidden" name="pricing_id">

                                                <!-- PLAN NAME -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Plan Name</label>
                                                    <input type="text" placeholder="enter your name" name="plan_name"
                                                        class="form-control">

                                                </div>

                                                <!-- SMALL DESCRIPTION -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Small Description</label>
                                                    <input type="text" placeholder="enter your description"
                                                        class="form-control" name="small_description" required>
                                                </div>

                                                <!-- PRICING -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Pricing</label>
                                                    <input type="text" placeholder="enter your price"
                                                        class="form-control" name="pricing">
                                                </div>

                                                <!-- duration  -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Durations</label>
                                                    <input type="text" placeholder="enter your duration" name="duration"
                                                        class="form-control">

                                                </div>

                                                <!-- SAMPLE LINK -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Package Sample Link</label>
                                                    <input type="url" placeholder="enter your sample-link"
                                                        class="form-control" name="sample_url"
                                                        placeholder="https://example.com/demo">
                                                </div>

                                            </div>

                                            <!-- ITEM LIST (EDIT LOOP – UNIQUE ID) -->
                                            <div class="mb-3">
                                                <label class="form-label">Item List</label>

                                                <div id="editItemWrapper"></div>


                                                <button type="button" class="btn btn-primary btn-sm"
                                                    onclick="addEditItem()">
                                                    + Add Item
                                                </button>
                                            </div>



                                            <!-- FOOTER -->
                                            <div class="text-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary ms-2">
                                                    Update Pricing Card
                                                </button>
                                            </div>

                                        </form>



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



<!-- insert -->
<script>
    function addItem() {
        const wrapper = document.getElementById('itemWrapper');
        const div = document.createElement('div');
        div.className = 'd-flex mb-2';
        div.innerHTML = `
        <input type="text" name="item_list[]" class="form-control me-2" placeholder="Feature text">
        <button type="button" class="btn btn-secondary btn-sm" onclick="removeItem(this)">Remove</button>
    `;
        wrapper.appendChild(div);
    }

    function removeItem(btn) {
        btn.parentElement.remove();
    }
</script>


<!-- update js here  -->
<script>
    function addEditItem() {
        const wrapper = document.getElementById('editItemWrapper');

        const div = document.createElement('div');
        div.className = 'd-flex mb-2';

        div.innerHTML = `
        <input type="text" name="item_list[]" class="form-control me-2" placeholder="enter your feature">
        <button type="button" class="btn btn-secondary btn-sm" onclick="removeEditItem(this)">Remove</button>
    `;

        wrapper.appendChild(div);
    }

    function removeEditItem(btn) {
        btn.parentElement.remove();
    }
</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {

        var editModal = document.getElementById('editPriceModal');

        editModal.addEventListener('show.bs.modal', function (event) {

            var button = event.relatedTarget;

            // Get data from button
            var id = button.getAttribute('data-id');
            var plan = button.getAttribute('data-plan');
            var desc = button.getAttribute('data-desc');
            var price = button.getAttribute('data-price');
            var duration = button.getAttribute('data-duration');
            var sample = button.getAttribute('data-sample');
            var items = button.getAttribute('data-items');

            try {
                items = JSON.parse(items);
            } catch (e) {
                items = [];
            }

            // Set values in modal form
            editModal.querySelector('input[name="pricing_id"]').value = id;
            editModal.querySelector('input[name="plan_name"]').value = plan;
            editModal.querySelector('input[name="small_description"]').value = desc;
            editModal.querySelector('input[name="pricing"]').value = price;
            editModal.querySelector('input[name="duration"]').value = duration;
            editModal.querySelector('input[name="sample_url"]').value = sample;

            // Clear previous items
            var wrapper = editModal.querySelector('#editItemWrapper');
            wrapper.innerHTML = '';

            // Add item list
            items.forEach(function (item) {
                var div = document.createElement('div');
                div.className = 'd-flex mb-2';

                div.innerHTML = `
                <input type="text" name="item_list[]" class="form-control me-2" value="${item}">
                <button type="button" class="btn btn-secondary btn-sm" onclick="removeEditItem(this)">Remove</button>
            `;

                wrapper.appendChild(div);
            });

        });

    });
</script>


<!-- prefill data fetch date in edit form -->



<!-- Container-fluid Ends-->