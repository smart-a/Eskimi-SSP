<template>
    <div class="modal m-auto modal-dialog-scrollable " id="myModal" style="display: block;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content pb-3">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Advert Banner - {{this.advertName}}</h5>
                    <button type="button" class="close" @click="$emit('close')" data-dismiss="modal">×</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div v-for="bannerImage in this.banner" :key="bannerImage.id" >
                        <div class="mb-3">
                            <b-img :src="bannerImage.image" fluid alt="Responsive image" class="w-100"></b-img>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" @click="$emit('close')" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['banner','advertName'],
    data: () => ({
        showModel: false
    })
}
</script>
