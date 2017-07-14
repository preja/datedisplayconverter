Usage:

```php
public function behaviors() {
        return [
            TimestampBehavior::className(),
            ['class' => DateConverter::className(),
                'dateAttributes' =>
                [
                    'created_at' => [DateConverter::DISPLAY_FORMAT => 'Y-m-d', DateConverter::SAVE_FORMAT => 'timestamp'],
                    'updated_at' => [DateConverter::DISPLAY_FORMAT => 'Y-DD-M', DateConverter::SAVE_FORMAT => 'timestamp']
                ]
            ]
        ];
    }
```
