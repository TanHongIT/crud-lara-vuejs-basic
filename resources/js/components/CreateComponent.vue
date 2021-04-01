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
                  <th scope="row">{{index+1}}</th>
                  <td>{{student.name}}</td>
                  <td>{{student.email}}</td>
                  <td>{{student.phone}}</td>
                  <td>Dele</td>
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
        this.students = response.data;
        console.log(response.data);
      });
    },
  },
};
</script>
