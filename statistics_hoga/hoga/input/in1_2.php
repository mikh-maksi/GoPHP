<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
    <table>
        <tr>
            <td>Показник</td>
            <td><select name="kved" id="">
                    <option value="1">Добувна промисловість і розроблення кар’єрів (B)</option>
                    <option value="2">Переробна промисловість(C)</option>
                    <option value="3">Виробництво харчових продуктів, напоїв та тютюнових виробів(10-12)</option>
                    <option value="4">Текстильне виробництво, виробництво одягу, шкіри, виробів зі шкіри та інших матеріалів(13-15)</option>
                    <option value="5">Виготовлення виробів з деревини, виробництво паперу та поліграфічна діяльність  (16-18)</option>
                    <option value="6">Виробництво коксу та продуктів нафтоперероблення (19)</option>
                    <option value="7">Виробництво хімічних речовин і хімічної продукції (20)</option>
                    <option value="8">Виробництво основних фармацевтичних продуктів і фармацевтичних препаратів (21)</option>
                    <option value="9">Виробництво гумових і пластмасових виробів, іншої неметалевої мінеральної продукції (22, 23)</option>
                    <option value="10">Металургійне виробництво, виробництво готових металевих виробів, крім машин і устатковання (24, 25)</option>
                    <option value="11">Машинобудування, крім ремонту і монтажу машин і устатковання (26-30)</option>
                    <option value="12">Постачання електроенергії, газу, пари та кондиційованого повітря(D)</option>
                    <option value="13">Водопостачання; каналізація, поводження з відходами(E)</option>
                    <option value="14">Забір, очищення та постачання води(E36)</option>
            </td>
        </tr>
        <tr>
            <td>Базовий рік</td>
            <td><input type="text" name = "year" placeholder = "2017"></td>
        </tr>
        <tr>
            <td>Місяць до місяця (в цьому році)</td>
            <td><select name="interval" id="">
                    <option value=""></option>
                    <option value="1">Січень</option>
                    <option value="2">Січень-лютий</option>
                    <option value="3">Січень-березень</option>
                    <option value="4">Січень-квітень</option>
                    <option value="5">Січень-травень</option>
                    <option value="6">Січень-червень</option>
                    <option value="7">Січень-липень</option>
                    <option value="8">Січень-серпень</option>
                    <option value="9">Січень-вересень</option>
                    <option value="10">Січень-жовтень</option>
                    <option value="11">Січень-листопад</option>
                    <option value="12">Січень-грудень</option>
                    
                </select></td>
        </tr>
        <tr>
            <td>Значення</td>
            <td><input type="text" name = "value"></td>
        </tr>
    </table>
    </div>
    <form>
    
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
</body>
</html>