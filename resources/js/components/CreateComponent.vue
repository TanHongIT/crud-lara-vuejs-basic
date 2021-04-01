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
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>
                      Dele
                  </td>
                </tr>
              </tbody>
            </table>
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
      name: "",
      email: "",
      phone: "",
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    saveStudent() {
      axios.post("save_student", {
        name: this.name,
        email: this.email,
        phone: this.phone,
      });
    },
  },
};
</script>
