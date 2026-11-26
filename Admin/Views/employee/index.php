<?php
require_once __DIR__ . '/../../../Config/config.php';
$path = $_SERVER['REQUEST_URI'];
$url = "localhost/".BASE_URL;

$title = "Welding Consumables";

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
                <h1 class="h3 mb-1">Employee</h1>
              </div>
            </div>
            <div class="heading-actions">
            </div>
          </div>

          <section class="panel mt-3">
            <div class="panel-header">
              <div>
                <h2 class="h5 mb-1 section-title"><i class="bi bi-people" aria-hidden="true"></i><span>List Employee</span></h2>
              </div>
              <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-circle" aria-hidden="true"></i> Add Data
            </button>
            </div>
            <div class="table-responsive">
              <table class="table align-middle mb-0 table-responsive table-hover" id="employeeTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-start">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col" >Action</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>
            <div class="modal fade" id="addModal" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <form class="needs-validation" novalidate id="formEmployee">
                        <div class="modal-header">
                            <h5 class="modal-title">Form Add Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row g-3">
                              <div class="col-md-12">
                                  <label class="form-label" for="formEmail">Name</label>
                                  <input class="form-control" type="text" name="name" id="name" required>
                                  <div class="invalid-feedback">Valid name is required.</div>
                              </div>
                              <div class="col-md-12">
                                  <label class="form-label" for="formEmail">Username</label>
                                  <input class="form-control" type="text" name="username" id="username" required>
                                  <div class="invalid-feedback">Valid username is required.</div>
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
                                  <label class="form-label" for="formEmail">Username</label>
                                  <input class="form-control" type="text" name="username" id="username_edit" required>
                                  <div class="invalid-feedback">Valid username is required.</div>
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
      const employeeUrl = '<?php echo URL ?>' + 'employee';
    </script>
    <script src="Assets/Employee/employee.js"></script>
</body>
</html>
