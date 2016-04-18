using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ClassLibrary1.Model.Purchase
{
    class Product
    {
        public Guid ProductId { get; set; }
        public string Name { get; set; }
        public float Price { get; set; }
        public string Thumb { get; set; }
        public string ShortDesc { get; set; }
    }
}
