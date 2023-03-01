<script setup>
import { Link } from '@inertiajs/inertia';
</script>

<template>
    <!-- inertia/createでフォーム入力し送信を押すと、inertia/indexページでフラッシュメッセージの表示 -->
    <div v-if="$page.props.flash.message" class="bg-blue-300">
    {{ $page.props.flash.message }}
    </div>
    indexページです
</template>
