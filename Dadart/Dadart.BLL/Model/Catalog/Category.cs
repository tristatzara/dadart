﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Model.Catalog
{
    public class Category
    {
        public Guid CategoryId { get; set; }
        public string Name { get; set; }
        public string DisplayName { get; set; }
    }
}
