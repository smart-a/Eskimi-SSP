<template>
    <div>
<!--        <preview-modal  :banner="this.banner" :dialog="this.modalShow"></preview-modal>-->
        <h3 class="text-center">Advert List</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Advert Name</th>
                <th>Date From</th>
                <th>Date To</th>
                <th>Daily Budget</th>
                <th>Total Budget</th>
                <th>Banner</th>
                 <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="advert in adverts" :key="advert.id">
                <td>{{ advert.advert_name }}</td>
                <td>{{ new Date(advert.date_from).toISOString().split('T')[0] }} </td>
                <td>{{ new Date(advert.date_to).toISOString().split('T')[0] }}</td>
                <td>${{ advert.daily_budget }}</td>
                <td>${{ advert.total_budget }}</td>
                <td>
                        <preview-button :num="advert.banner.length" @handleClick="preview(advert.id)"></preview-button>
                </td>
                <td>
                    <button class="btn btn-sm btn-success">Edit</button>
                </td>
            </tr>
            </tbody>
        </table>
        <v-modal v-if="modalShow" @close="modalShow = false" :advertName="this.advertName" :banner="this.banner"/>
    </div>

</template>

<script>
import Button from './Button.vue'
import VModal from "./VModal";

export default {
    components:{
        'preview-button': Button,
        'v-modal': VModal,
    },
    data() {
        return {
            adverts: [],
            banner: null,
            advertName: null,
            modalShow: false
        }
    },
    created() {
        this.axios
            .get('/api/adverts/')
            .then(response => {
                if(response)
                    this.adverts = response.data;
            });
    },
    methods: {
        preview(id) {
            let advert = this.adverts.find(a => a.id == id);
            this.banner =advert.banner;
            this.advertName = advert.advert_name;
            this.modalShow = true;
        }
    }
}
</script>
