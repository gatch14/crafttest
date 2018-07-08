<div class="form-group row align-items-center" :class="{'has-danger': errors.has('path'), 'has-success': this.fields.path && this.fields.path.valid }">
    <label for="path" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.image.columns.path') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="file" v-model="form.path" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('path'), 'form-control-success': this.fields.path && this.fields.path.valid}" id="path" name="path" placeholder="{{ trans('admin.image.columns.path') }}">
        <div v-if="errors.has('path')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('path') }}</div>
    </div>
</div>


