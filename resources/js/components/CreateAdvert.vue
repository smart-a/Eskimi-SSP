<template>
    <div>
        <h3 class="text-center">Create Advert</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addAdvert" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Advert Name</label>
                        <input type="text" class="form-control" required v-model="advert.advert_name">
                    </div>
                    <div class="form-group">
                        <label>Dates From</label>
                        <input type="date" class="form-control" required v-model="advert.date_from">
                    </div>
                    <div class="form-group">
                        <label>Dates To</label>
                        <input type="date" class="form-control" required v-model="advert.date_to">
                    </div>
                    <div class="form-group">
                        <label>Daily Budget ($)</label>
                        <input type="number" @input="handleTotal" required class="form-control" v-model="advert.daily_budget">
                    </div>
                    <div class="form-group">
                        <label>Total Budget ($)</label>
                        <input type="number" readonly class="form-control" v-model="advert.total_budget">
                    </div>
                    <div class="form-group">
                        <label>Upload Banner</label>
                        <b-form-file accept="image/*" ref="files" required multiple></b-form-file>
                    </div>
                    <button type="submit" ref="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import __ from "lodash/fp/__";

export default {
    data() {
        return {
            advert: {},
        }
    },
    methods: {
        addAdvert() {
            this.$refs.submit.innerText = "Saving...";
            this.$refs.submit.disabled = true;

            let formData = new FormData();
            formData.append('advert_name', this.advert.advert_name);
            formData.append('date_from', this.advert.date_from);
            formData.append('date_to', this.advert.date_to);
            formData.append('daily_budget', this.advert.daily_budget);
            formData.append('total_budget', this.advert.total_budget);

            //Add banner image to form data
            for(let i = 0; i < this.$refs.files.files.length; i++ ){
                let file = this.$refs.files.files[i];
                formData.append('files[' + i + ']', file);
            }

            this.axios
                .post('/api/adverts/', formData,{
                    headers: {
                        'Content-Type': "multipart/form-data; charset=utf-8;"
                    }
                })
                .then(response => (
                    this.$router.push({ name: 'home' })
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        },
        handleTotal(){
            let daily_budget = Number(this.advert.daily_budget);
            this.advert.total_budget = daily_budget * this.dateDiff();
        },
        dateDiff(){
            const _MS_PER_DAY = 1000 * 60 * 60 * 24;
            const date_from = new Date(this.advert.date_from);
            const date_to = new Date(this.advert.date_to);
            const d_from = Date.UTC(date_from.getFullYear(), date_from.getMonth(), date_from.getDate());
            const d_to = Date.UTC(date_to.getFullYear(), date_to.getMonth(), date_to.getDate());

            return Math.floor((d_to - d_from) / _MS_PER_DAY);
        }
    }
}
</script>
