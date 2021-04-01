<template>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">Ctreate new student</div>

          <div class="card-body">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input
                  type="text"
                  v-model="name"
                  class="form-control"
                  placeholder="Enter Name"
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input
                  type="email"
                  v-model="email"
                  class="form-control"
                  placeholder="Enter email"
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input
                  type="phone"
                  v-model="phone"
                  class="form-control"
                  placeholder="Enter Phone"
                />
              </div>

              <button
                type="submit"
                v-on:click.prevent="saveStudent"
                class="btn btn-primary"
              >
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Ctreate new student</div>

          <div class="card-body">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(student, index) in students.data" :key="student.id">
                  <th scope="row">{{ index + 1 }}</th>
                  <td>{{ student.name }}</td>
                  <td>{{ student.email }}</td>
                  <td>{{ student.phone }}</td>
                  <td>
                    <button
                      type="button"
                      @click="editStudent(student.id)"
                      class="btn btn-primary"
                      data-toggle="modal"
                      data-target="#exampleModal"
                    >
                      Edit
                    </button>
                    |
                    <button
                      type="button"
                      class="btn btn-primary"
                      data-toggle="modal"
                      data-target="#exampleModal"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <pagination
              :data="students"
              @pagination-change-page="getResults"
            ></pagination>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form>
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input
                  type="text"
                  v-model="edit_name"
                  class="form-control"
                  placeholder="Enter Name"
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input
                  type="email"
                  v-model="edit_email"
                  class="form-control"
                  placeholder="Enter email"
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input
                  type="phone"
                  v-model="edit_phone"
                  class="form-control"
                  placeholder="Enter Phone"
                />
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Close
              </button>
              <button
                type="button"
                v-on:click.prevent="updateStudent"
                class="btn btn-primary"
              >
                Save changes
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      students: {},
      name: "",
      email: "",
      phone: "",

      edit_name: "",
      edit_email: "",
      edit_phone: "",

      id: '',
    };
  },
  mounted() {
    // Fetch initial results
    this.getResults();
  },
  methods: {
    saveStudent() {
      axios.post("save_student", {
        name: this.name,
        email: this.email,
        phone: this.phone,
      });
    },

    // Our method to GET results from a Laravel endpoint
    getResults(page = 1) {
      axios.get("all_students/?page=" + page).then((response) => {
        console.log(response.data);
        this.students = response.data;
      });
    },
    // create method edit student
    editStudent(id) {
      axios.get("edit_student/" + id).then((response) => {
        console.log(response.data);
        this.id = response.data.id;
        this.edit_name = response.data.name;
        this.edit_email = response.data.email;
        this.edit_phone = response.data.phone;
      });
    },
    updateStudent(){
      console.log(this.id);
      axios.put("update_student" , {
        name: this.edit_name,
        email: this.edit_email,
        phone: this.edit_phone,
      })
      .then(response => console.log(response));
    },
  },
};
</script>
