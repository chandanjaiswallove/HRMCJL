<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>My Resume</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_playground') ?>">
                                <svg class="stroke-icon">
                                    <use href="modules/assets2/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('resume'); ?>">My Resume</a> </li>
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
                 <form class="card" action="<?= base_url('update_resume'); ?>" method="POST">
                        <div class="card-body">
                            <h5 class="mb-3">Education / Experience</h5>

                           <div id="blocks-wrapper">

<?php if(!empty($education)): $i=0; ?>

<?php foreach($education as $block): ?>

<div class="edu-block border rounded p-3 mb-3" data-index="<?= $i ?>">

    <div class="d-flex justify-content-between mb-2">
        <strong>Block</strong>
        <button type="button"
            class="btn btn-secondary btn-sm remove-block <?= $i==0 ? 'd-none':'' ?>">
            Remove Block
        </button>
    </div>

    <!-- DATE -->
    <div class="mb-3">
        <label>Date</label>
        <div class="input-group mb-2">
            <input type="text"
                name="education[<?= $i ?>][date]"
                class="form-control rounded"
                value="<?= $block->date ?>"
                placeholder="2010 - 2013">
        </div>
    </div>

    <!-- TITLE + DESCRIPTION -->
    <div class="mb-3">
        <label>Title / Description</label>

        <div class="pair-wrapper">

        <?php if(!empty($block->items)): ?>

            <?php foreach($block->items as $k=>$item): ?>

            <div class="pair-field border rounded p-2 mb-2">

                <input type="text"
                    name="education[<?= $i ?>][title][]"
                    class="form-control mb-2 rounded"
                    value="<?= $item->title ?>"
                    placeholder="Bachelor Degree Title">

                <input type="text"
                    name="education[<?= $i ?>][desc][]"
                    class="form-control mb-2 rounded"
                    value="<?= $item->description ?>"
                    placeholder="Description">

                <button type="button"
                    class="btn btn-secondary btn-sm remove-field <?= $k==0 ? 'd-none':'' ?>">
                    Remove
                </button>

            </div>

            <?php endforeach; ?>

        <?php endif; ?>

        </div>

        <button type="button" class="btn btn-sm btn-primary add-pair">
            + Add More
        </button>
    </div>

</div>

<?php $i++; endforeach; ?>

<?php else: ?>

<!-- agar DB me kuch nahi to default empty block -->
<div class="edu-block border rounded p-3 mb-3" data-index="0">
    <input type="text" name="education[0][date]" class="form-control">
</div>

<?php endif; ?>

</div>


                            <button type="button" class="btn btn-primary" id="add-block">
                                + Add New Block
                            </button>

                        </div>

                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">
                                Update Resume
                            </button>
                        </div>

                    </form>

                    <script>
                      let blockIndex = <?= !empty($education) ? count($education) : 1 ?>;


                        // ADD NEW BLOCK
                        document.getElementById('add-block').addEventListener('click', function () {
                            const wrapper = document.getElementById('blocks-wrapper');

                            const block = `
    <div class="edu-block border rounded p-3 mb-3" data-index="${blockIndex}">
        <div class="d-flex justify-content-between mb-2">
            <strong>Block</strong>
            <button type="button" class="btn btn-secondary btn-sm remove-block">Remove Block</button>
        </div>

             <!-- DATE -->
                                    <div class="mb-3">
                                        <label>Date</label>
                                        <div class="date-wrapper">
                                            <div class="input-group mb-2 ">
                                                <input type="text" name="education[${blockIndex}][date]"
                                                    class="form-control rounded" placeholder="2010 - 2013">

                                            </div>
                                        </div>
                                    </div>


                                    <!-- TITLE + DESCRIPTION -->
                                    <div class="mb-3">
                                        <label>Title / Description</label>

                                        <div class="pair-wrapper">

                                            <!-- ONE PAIR -->
                                            <div class="pair-field border rounded p-2 mb-2">

                                                <input type="text" name="education[${blockIndex}][title][]"

                                                    class="form-control mb-2 rounded"
                                                    placeholder="Bachelor Degree Title">

                                                <input type="text" name="education[${blockIndex}][desc][]"

                                                    class="form-control mb-2 rounded"
                                                    placeholder="US University Description">

                                                <button type="button"
                                                    class="btn btn-secondary btn-sm remove-field d-none">
                                                    Remove
                                                </button>

                                            </div>

                                        </div>

                                        <button type="button" class="btn btn-sm btn-primary add-pair">
                                            + Add More
                                        </button>
                                    </div>                      

    </div>`;

                            wrapper.insertAdjacentHTML('beforeend', block);
                            blockIndex++;
                        });

                        // CLICK EVENTS
                        document.addEventListener('click', function (e) {

                            const block = e.target.closest('.edu-block');
                            if (!block) return;

                            const i = block.dataset.index;

                            // ADD TITLE + DESCRIPTION PAIR
                            if (e.target.classList.contains('add-pair')) {
                                const wrapper = block.querySelector('.pair-wrapper');

                                wrapper.insertAdjacentHTML('beforeend', pairHTML(i));

                                // sab remove buttons show karo agar 1 se zyada pair ho
                                if (wrapper.children.length > 1) {
                                    wrapper.querySelectorAll('.remove-field').forEach(btn => {
                                        btn.classList.remove('d-none');
                                    });
                                }
                            }


                            // REMOVE PAIR (minimum 1 pair always rahe)
                            if (e.target.classList.contains('remove-field')) {
                                const wrapper = block.querySelector('.pair-wrapper');

                                if (wrapper.children.length > 1) {
                                    e.target.closest('.pair-field').remove();
                                }
                            }

                            // REMOVE BLOCK
                            if (e.target.classList.contains('remove-block')) {
                                block.remove();
                            }

                        });


                        // PAIR HTML
                        function pairHTML(i) {
                            return `
<div class="pair-field border rounded p-2 mb-2">

<input type="text" name="education[${i}][title][]"
class="form-control mb-2 rounded"
placeholder="Bachelor Degree Title">

<input type="text" name="education[${i}][desc][]"
class="form-control mb-2 rounded"
placeholder="US University Description">

<button type="button"
class="btn btn-secondary btn-sm remove-field">
Remove
</button>

</div>`;
                        }

                    </script>


                </div>

            </div>
        </div>

    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid Ends-->



















</div>