<?php
require_once __DIR__ . '/../../../Config/config.php';
$path = $_SERVER['REQUEST_URI'];

$title = "Tools & materials";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . '/../layouts/header.php'; ?>
</head>

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
      <?php include __DIR__ . '/../layouts/sidebar.php'; ?>
    </aside>

    <div class="admin-main">
      <nav class="navbar admin-navbar navbar-expand bg-white">
        <?php include __DIR__ . '/../layouts/navbar.php'; ?>
      </nav>

      <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
              <div>
                <h1 class="h3 mb-1">Tools & Materials</h1>
              </div>
            </div>
            <div class="heading-actions">
            </div>
          </div>

          <section class="panel mt-3">
            <div class="panel-header">
              <div>
                <h2 class="h5 mb-1 section-title"><i class="bi bi-people" aria-hidden="true"></i><span>List Tools & Materials</span></h2>
              </div>
              <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-circle" aria-hidden="true"></i> Add Data
            </button>
            </div>
            <div class="table-responsive">
              <table class="table align-middle mb-0 table-responsive table-hover" id="materialTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-start">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col" >Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($data as $index => $row) : ?>
                    <tr>
                        <td><?php echo $no ++; ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td>
                            <button class='btn btn-sm btn-warning me-2' onclick="editData(<?= $row['id'] ?>)">Edit</button>
                            <button class='btn btn-sm btn-danger' onclick="deleteData('<?= $row['id'] ?>')">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </section>
            <div class="modal fade" id="addModal" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <form class="needs-validation" novalidate>
                        <div class="modal-header">
                            <h5 class="modal-title">Form Add Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row g-3">
                              <div class="col-md-12">
                                  <label class="form-label" for="formEmail">Name</label>
                                  <input class="form-control" type="text" name="name" required>
                                  <div class="invalid-feedback">Valid name is required.</div>
                              </div>
                              <div class="col-md-12">
                                  <label class="form-label" for="formEmail">Description</label>
                                  <textarea class="form-control" name="description" rows="3"></textarea>
                              </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveButton">Save</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>

            <!-- //edit modal -->
            <div class="modal fade" id="editModal" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <form class="needs-validation" novalidate>
                        <div class="modal-header">
                            <h5 class="modal-title">Form Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row g-3">
                              <div class="col-md-12">
                                  <input class="form-control" type="hidden" name="id" id="id">
                                  <label class="form-label" for="formEmail">Name</label>
                                  <input class="form-control" type="text" name="name_edit" id="name_edit" required>
                                  <div class="invalid-feedback">Valid name is required.</div>
                              </div>
                              <div class="col-md-12">
                                  <label class="form-label" for="formEmail">Description</label>
                                  <textarea class="form-control" rows="3" name="description_edit" id="description_edit"></textarea>
                              </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="updateButton">Update</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
      </main>

      <footer class="admin-footer">
        <?php include __DIR__ . '/../layouts/footer.php' ?>
      </footer>
    </div>
  </div>
    <?php include __DIR__ . '/../layouts/js.php' ?>
    <script> 
      const materialsUrl = '<?php echo URL ?>' + 'material';
    </script>     
    <script src="Assets/Material/material.js"></script>
</body>
</html>
