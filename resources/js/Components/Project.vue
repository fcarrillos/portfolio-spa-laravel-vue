<template>
    <section class="
        flex
        items-end
        px-44
        py-6
        justify-between
    ">
        <div
            :class="color"
            class="bg-gray-100 h20 w-20 shrink-0 rounded-2xl"
        >
            <slot></slot>
        </div>

        <p class="text-4xl font-extrabold mx-10 flex-1">
            {{ title }}
        </p>
        <p class="text-2xl mx-10 flex-1">
            {{ description }}
        </p>
    </section>
</template>

<script>
    export default {
        props: [
            'title',
            'description',
            'color',
        ]
    }
</script>