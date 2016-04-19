using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Model.Cart
{
    class Product
    {
        public Guid ProductId { get; set; }
        public string Name { get; set; }
        public float Price { get; set; }
        public string CartDescription { get; set; }
        public string Thumb { get; set; }
    }
}
