# 百度地图鹰眼

<img src="https://img.shields.io/badge/status-testing-orange">
<img src="https://img.shields.io/badge/php-7.4-brightgreen">


## 概念说明

**service_id**:

服务ID，需要在[百度鹰眼后台](https://lbsyun.baidu.com/trace/admin/service)主动创建，生成service_id

**ak**:

应用ID，需要在[应用管理后台](https://lbsyun.baidu.com/apiconsole/key#/home)主动创建生成

**entity**

鹰眼监控对象ID，由使用者自行设定，名称中英文均可，原则上不能重复。

## 使用

### 上传轨迹

#### 单个经纬度点上传

```php
$track_upload = new TrackUpload($ak, $service_id, $entity);
$track_upload->addpoint([$longitude, $latitude], $create_time);
```

#### 多个经纬度点上传

*开发中*

### 地理围栏

#### 新增围栏

**注意**

$position 必须是Array，格式[[维度1,经度1], [维度2,经度2], [维度3,经度3]]

```php
$fence = new FenceMake($ak, $service_id);
$fence->CreatePolygen($position, $fence_name);
```

#### 更新围栏

**注意**

$fence_id 是在创建围栏后由百度返回

```php
$fence = new FenceUpdate($ak, $service_id);
$fence->UpdatePolygen($fence_id, $fence_name, $position);
```

#### 删除围栏

**注意**

$fence_ids 格式为Array [$fence_id1, $fence_id2]

```php
$fence = new FenceDelete($ak, $service_id);
$fence->DeleteFences($fence_ids);
```

#### 读取围栏

```php
$all = new Fence($ak, $service_id);
$fences = $all->GetFences($fence_ids);
```

#### 绑定监控对象

```php

```

#### 删除监控对象

```php

```

#### 读取监控对象

```php

```