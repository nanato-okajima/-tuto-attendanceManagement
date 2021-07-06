<template>
  <div>
    <div class="alert alert-success" v-if="saved">出席登録が完了しました！</div>

    <div class="well well-sm" id="attendance-form">
      <form class="form-horizontal" method="POST" @submit.prevent="onSubmit">
        <fieldset>
          <legend class="text-center">本日の勉強会へ出席登録</legend>

          <div class="form-group">
            <label for="name" class="col-md-3 control-label">名前</label>
            <div class="col-md-9" :class="{'has-error': errors.name}">
              <input type="text" id="name" v-model="attendance.name" placeholder="あなたのお名前" class="form-control">
              <span v-if="errors.name" class="help-block text-dander">{{ errors.name[0] }}</span>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="col-md-3 control-label">メールアドレス</label>
            <div class="col-md-9" :class="{'ha-error': errors.email}">
              <input type="text" id="email" v-model="attendance.email" placeholder="あなたのメールアドレス" class="form-control">
              <span v-if="errors.email" class="help-block text-danger">{{ errors.email[0] }}</span>
            </div>
          </div>

          <div class="form-group">
            <lable class="col-md-3 control-label" for="body">意気込み</lable>
            <div class="col-md-9" :class="{'has-error': errors.body}">
              <textarea id="body" v-model="attendance.body" placeholder="本日の意気込み" rows="5"></textarea>
              <span v-if="errors.body" class="help-block text-danger">{{ errrors.body[0] }}</span>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12 text-right">
              <button class="btn btn-primary btn-lg" type="submit">出席する</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      errors: [],
      saved: false,
      attendance: {
        name: null,
        email: null,
        body: null
      }
    };
  },
  methods: {
    onSubmit() {
      this.saved = false;

      axios.post('api/attendances', this.attendance)
          .then(({data}) => this.setSuccessMessage())
          .catch(({response}) => this.setErrors(response));
    },
    setErrors(response) {
      this.errors = response.data.errors;
    },
    setSuccessMessage() {
      this.reset();
      this.saved = true;
    },
    reset() {
      this.errors = [];
      this.attendance = {name: null, email: null, body: null};
    }
  }
}
</script>
