<template>
  <div class="container">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">New Note</div>
        <div class="card-body">
          <form action="#" method="post" @submit.prevent="store">
            <div action class="form-group">
              <label for="title">Title</label>
              <input type="text" v-model="form.title" id="title" class="form-control" />
            </div>

            <div class="form-group">
              <label for="subject">Subject</label>
              <select v-model="form.subject" id="subject" class="form-control">
                <option v-for="subject in subjects" :key="subject.id" :value="subject.id">
                  {{ subject.name }}
                </option>
              </select>
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea v-model="form.description" id="description" rows="5" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
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
      form: {
        title: '',
        description: '',
        select: '',
      },
      subjects: []
    };
  },
  mounted() {
    this.getSubjects();
  },

  methods: {
    async getSubjects() {
      let response = await axios.get('/api/subjects');
      // console.log(response.data);
      if (response.status === 200) {
        this.subjects = response.data
      }
    },
    async store() {
      let response = await axios.post('/api/notes/create-new-note', this.form);
      if (response.status == 200) {
        console.log(response.data)
      }
    },
  },
};
</script>